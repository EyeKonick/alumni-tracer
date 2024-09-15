<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use App\Models\EmploymentStatus;
use Illuminate\Http\Request;

class AlumniEmployabilityController extends Controller
{
    public function showEmployabilityTracerData(Request $request)
    {
        $query = PersonalData::with(['professionalData.employmentStatus', 'courseGraduated']);

        if ($request->has('course') && $request->input('course') !== 'all') {
            $query->whereHas('courseGraduated', function ($query) use ($request) {
                $query->where('course_name', $request->input('course'));
            });
        }

        if ($request->has('employment_status') && $request->input('employment_status') !== 'all') {
            $status = $request->input('employment_status');
            $query->whereHas('professionalData', function ($query) use ($status) {
                $query->whereHas('employmentStatus', function ($query) use ($status) {
                    $query->where('status_name', $status);
                });
            });
        }

        $allowedSortDirections = ['asc', 'desc'];

        $sortLastName = $request->input('sort_last_name');
        if ($sortLastName && in_array($sortLastName, $allowedSortDirections)) {
            $query->orderBy('last_name', $sortLastName);
        }

        $sortYearGraduated = $request->input('sort_year_graduated');
        if ($sortYearGraduated && in_array($sortYearGraduated, $allowedSortDirections)) {
            $query->orderBy('year_graduated', $sortYearGraduated);
        }
        $sortEmploymentStatus = $request->input('sort_employment_status');
        if ($sortEmploymentStatus && in_array($sortEmploymentStatus, $allowedSortDirections)) {
            $query->join('professional_data', 'personal_data.id', '=', 'professional_data.personal_data_id')
                  ->join('employment_statuses', 'professional_data.employment_status_id', '=', 'employment_statuses.id')
                  ->orderBy('employment_statuses.status_name', $sortEmploymentStatus);
        }

        $alumniData = $query->paginate(15);

        $courses = PersonalData::with('courseGraduated')
            ->get()
            ->pluck('courseGraduated.course_name')
            ->unique()
            ->sort()
            ->values();

        $employmentStatuses = EmploymentStatus::pluck('status_name')->unique()->sort()->values();

        return view('employability', compact('alumniData', 'courses', 'employmentStatuses'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $query = PersonalData::query()
            ->where('last_name', 'like', "%{$search}%")
            ->orWhere('first_name', 'like', "%{$search}%")
            ->orWhere('year_graduated', 'like', "%{$search}%")
            ->orWhereHas('courseGraduated', function ($query) use ($search) {
                $query->where('course_name', 'like', "%{$search}%");
            })
            ->orWhereHas('professionalData', function ($query) use ($search) {
                $query->where('present_position', 'like', "%{$search}%")
                    ->orWhereHas('employmentStatus', function ($subQuery) use ($search) {
                        $subQuery->where('status_name', 'like', "%{$search}%");
                    });
            });

        $allowedSortDirections = ['asc', 'desc'];


        $sortLastName = $request->input('sort_last_name');
        if ($sortLastName && in_array($sortLastName, $allowedSortDirections)) {
            $query->orderBy('last_name', $sortLastName);
        }

        $sortYearGraduated = $request->input('sort_year_graduated');
        if ($sortYearGraduated && in_array($sortYearGraduated, $allowedSortDirections)) {
            $query->orderBy('year_graduated', $sortYearGraduated);
        }

        $sortEmploymentStatus = $request->input('sort_employment_status');
        if ($sortEmploymentStatus && in_array($sortEmploymentStatus, $allowedSortDirections)) {
            $query->join('professional_data', 'personal_data.id', '=', 'professional_data.personal_data_id')
                ->join('employment_statuses', 'professional_data.employment_status_id', '=', 'employment_statuses.id')
                ->orderBy('employment_statuses.status_name', $sortEmploymentStatus);
        }

        $alumniData = $query->paginate(10);

        $courses = PersonalData::with('courseGraduated')
            ->get()
            ->pluck('courseGraduated.course_name')
            ->unique()
            ->sort()
            ->values();

        $employmentStatuses = EmploymentStatus::pluck('status_name')->unique()->sort()->values();

        return view('employability', compact('alumniData', 'courses', 'employmentStatuses'));
    }
}
