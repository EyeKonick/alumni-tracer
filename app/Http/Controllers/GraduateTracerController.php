<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use App\Models\ProfessionalData;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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
            $graduatesQuery = PersonalData::where('course_graduated_id', $course->id);
            $employedQuery = ProfessionalData::whereIn('alumni_id', function ($query) use ($course) {
                $query->select('id')
                    ->from('personal_data')
                    ->where('course_graduated_id', $course->id);
            })
            ->whereIn('employment_status_id', [1, 2, 3])
            ->where('is_employed', 1);

            // Apply year filter if provided
            if ($year) {
                $graduatesQuery->whereYear('year_graduated', $year);
                $employedQuery->whereYear('inclusive_from', $year);
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
