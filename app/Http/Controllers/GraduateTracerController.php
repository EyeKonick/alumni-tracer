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

        $data = [];
        $totalGraduates = 0;
        $totalEmployed = 0;

        foreach ($courses as $course) {
            $graduates = PersonalData::where('course_graduated_id', $course->id)->count();

            $employed = ProfessionalData::whereIn('alumni_id', function ($query) use ($course) {
                $query->select('id')
                      ->from('personal_data')
                      ->where('course_graduated_id', $course->id);
            })
            ->whereIn('employment_status_id', [1, 2, 3])
            ->where('is_employed', 1)
            ->count();

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

       
        $currentPage = $request->input('page', 1);

        
        $perPage = 15;
        $offset = ($currentPage - 1) * $perPage;

        $paginatedData = new LengthAwarePaginator(
            array_slice($data, $offset, $perPage),
            count($data),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('graduate-tracer', ['data' => $paginatedData]);
    }
}
