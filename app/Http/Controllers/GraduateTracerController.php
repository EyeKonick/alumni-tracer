<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use App\Models\ProfessionalData;
use App\Models\Course;
use Illuminate\Http\Request;

class GraduateTracerController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::all();
        $year = $request->input('year', null); // Fetch year filter from the request
        $data = [];
        $totalGraduates = 0;
        $totalEmployed = 0;

        foreach ($courses as $course) {
            // Query to count graduates for the course
            $graduatesQuery = PersonalData::where('course_graduated_id', $course->id);

            // Query to count employed graduates for the course
            $employedQuery = ProfessionalData::whereIn('alumni_id', function ($query) use ($course, $year) {
                $query->select('id')
                    ->from('personal_data')
                    ->where('course_graduated_id', $course->id)
                    ->when($year, function ($q) use ($year) {
                        $q->whereYear('year_graduated', $year);
                    });
            })->where('is_employed', 1);

            // Apply year filter to graduates query
            if ($year) {
                $graduatesQuery->whereYear('year_graduated', $year);
            }

            $graduates = $graduatesQuery->count();
            $employed = $employedQuery->count();
            $percentageEmployed = $graduates > 0 ? ($employed / $graduates) * 100 : 0;

            $data[] = [
                'course' => $course->course_name,
                'graduates' => $graduates,
                'employed' => $employed,
                'percentage_employed' => number_format($percentageEmployed, 2) . '%',
            ];

            $totalGraduates += $graduates;
            $totalEmployed += $employed;
        }

        $data[] = [
            'course' => 'Total',
            'graduates' => $totalGraduates,
            'employed' => $totalEmployed,
            'percentage_employed' => $totalGraduates > 0 ? number_format(($totalEmployed / $totalGraduates) * 100, 2) . '%' : '0%',
        ];

        return view('graduate-tracer', ['data' => $data, 'year' => $year]);
    }


}
