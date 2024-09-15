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
            ->whereIn('employment_status_id', [1, 2])
            ->count();

            $percentageEmployed = $graduates > 0 ? ($employed / $graduates) * 100 : 0;

            // Append data for this course
            $data[] = [
                'course' => $course->course_name,
                'graduates' => $graduates,
                'employed' => $employed,
                'percentage_employed' => number_format($percentageEmployed, 2) . '%',
            ];

            // Accumulate totals
            $totalGraduates += $graduates;
            $totalEmployed += $employed;
        }

        // Add total data at the end of the data array
        $data[] = [
            'course' => 'Total',
            'graduates' => $totalGraduates,
            'employed' => $totalEmployed,
            'percentage_employed' => $totalGraduates > 0 ? number_format(($totalEmployed / $totalGraduates) * 100, 2) . '%' : '0%',
        ];

        // Get current page from the request, default is 1
        $currentPage = $request->input('page', 1);

        // Manually paginate the results (15 items per page)
        $perPage = 15;
        $offset = ($currentPage - 1) * $perPage;

        $paginatedData = new LengthAwarePaginator(
            array_slice($data, $offset, $perPage), // Slice the data according to the current page
            count($data), // Total number of items
            $perPage, // Items per page
            $currentPage, // Current page number
            ['path' => $request->url(), 'query' => $request->query()] // Path and query string for pagination links
        );

        return view('graduate-tracer', ['data' => $paginatedData]);
    }
}
