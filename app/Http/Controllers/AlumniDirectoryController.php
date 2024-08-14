<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\PersonalData;
use App\Models\Course; // Import the Course model
use Illuminate\Http\Request;

class AlumniDirectoryController extends Controller
{
    public function displayAlumni(Request $request)
    {
        // Fetch all courses for the dropdown
        $courses = Course::pluck('course_name', 'id')->toArray(); // Get course names and ids

        // Build query
        $query = PersonalData::join('alumnis', 'personal_data.alumni_id', '=', 'alumnis.id')
            ->join('course', 'personal_data.grad_course', '=', 'course.id') // Join with the course table
            ->select('alumnis.id', 'alumnis.first_name', 'alumnis.middle_name', 'alumnis.last_name', 'personal_data.grad_year', 'personal_data.major', 'course.course_name as grad_course')
            ->orderBy('personal_data.created_at', 'desc'); // Order by latest added

        // Apply filters
        if ($filters = $request->input('filter')) {
            foreach ($filters as $key => $value) {
                if (!empty($value)) {
                    if ($key === 'grad_course') {
                        // Filter by course name
                        $query->where('course.course_name', 'like', "%{$value}%");
                    } elseif ($key === 'grad_year') {
                        // Filter by predefined year
                        $query->where('personal_data.grad_year', $value);
                    } elseif ($key === 'grad_year_custom') {
                        // Filter by custom year
                        $query->where('personal_data.grad_year', $value);
                    } else {
                        // General filter
                        $query->where($key, 'like', "%{$value}%");
                    }
                }
            }
        }

        // Fetch paginated results
        $alumni = $query->paginate(10);

        // Pass courses to the view
        return view('alumni-directory', compact('alumni', 'courses'));
    }
}
