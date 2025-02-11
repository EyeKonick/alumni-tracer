<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use App\Models\EmploymentStatus;
use Illuminate\Http\Request;

class AlumniEmployabilityController extends Controller
{
    public function showEmployabilityTracerData(Request $request)
    {
        $startYear = (int) $request->input('start_year');
        $endYear = (int) $request->input('end_year');

        $query = PersonalData::with(['professionalData.employmentStatus', 'courseGraduated']);

        if ($startYear && $endYear) {
            $query->whereBetween('year_graduated', [$startYear, $endYear]);
        } elseif ($startYear) {
            $query->where('year_graduated', '>=', $startYear);
        } elseif ($endYear) {
            $query->where('year_graduated', '<=', $endYear);
        }

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

    public function showDirectoryTracerData(Request $request)
    {
        $startYear = (int) $request->input('start_year');
        $endYear = (int) $request->input('end_year');

        $query = PersonalData::with(['professionalData.employmentStatus', 'courseGraduated']);

        if ($startYear && $endYear) {
            $query->whereBetween('year_graduated', [$startYear, $endYear]);
        } elseif ($startYear) {
            $query->where('year_graduated', '>=', $startYear);
        } elseif ($endYear) {
            $query->where('year_graduated', '<=', $endYear);
        }

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

        return view('directory', compact('alumniData', 'courses', 'employmentStatuses'));
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

    public function exportEmployabilityAsExcel(Request $request)
    {

        $employabilityData = PersonalData::with(['courseGraduated', 'professionalData.employmentStatus'])
            ->orderBy('created_at')
            ->get();

        $fileName = 'employability-tracer-data.xls';

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        ob_start();

        echo '<html>';
        echo '<head>';
        echo '<style>';
        echo 'table { border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; }';
        echo 'th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }';
        echo 'th { background-color: #4CAF50; color: white; }';
        echo 'th:hover { background-color: #45a049; }';
        echo 'tr:nth-child(even) { background-color: #f2f2f2; }';
        echo 'tr:hover { background-color: #ddd; }';
        echo 'h1 { text-align: center; font-size: 24px; margin-bottom: 20px; }';
        echo '</style>';
        echo '</head>';
        echo '<body>';

        echo '<h1>Employability Tracer Data</h1>';

        echo '<table>';
        echo '<tr>';
        echo '<th>No</th>';
        echo '<th>Program/Course</th>';
        echo '<th>Name of Graduate</th>';
        echo '<th>Date of Graduation</th>';
        echo '<th>Date Hired for Current Job</th>';
        echo '<th>Employment Status Prior to Graduation</th>';
        echo '<th>Employment Status After Graduation</th>';
        echo '<th>Remarks</th>';
        echo '</tr>';

        foreach ($employabilityData as $index => $data) {
            echo '<tr>';
            echo '<td>' . ($index + 1) . '</td>';
            echo '<td>' . htmlspecialchars($data->courseGraduated->course_name ?? 'N/A') . '</td>';
            echo '<td>' . htmlspecialchars($data->last_name . ', ' . $data->first_name) . '</td>';
            echo '<td>' . htmlspecialchars($data->year_graduated ?? 'N/A') . '</td>';
            echo '<td>' . htmlspecialchars($data->professionalData->inclusive_from ?? 'N/A') . '</td>';
            echo '<td>' . 'N/A' . '</td>';
            echo '<td>' . htmlspecialchars($data->professionalData->employmentStatus->status_name ?? 'N/A') . '</td>';
            echo '<td>' . htmlspecialchars($data->professionalData->present_position ?? 'N/A') . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</body>';
        echo '</html>';

        $output = ob_get_clean();

        echo $output;
        exit;
    }
}
