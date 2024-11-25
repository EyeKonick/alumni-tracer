<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalData;

class AlumniDirectoryController extends Controller
{
    public function index(Request $request)
    {

        $alumniData = PersonalData::with('professionalData')
            ->orderBy('created_at')
            ->paginate(15);

        return view('directory', compact('alumniData'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $startYear = (int) $request->input('start_year');
        $endYear = (int) $request->input('end_year');

        $query = PersonalData::query();

        if ($startYear && $endYear) {
            dd($query->whereBetween('year_graduated', [$startYear, $endYear]));
        } elseif ($startYear) {
            $query->where('year_graduated', '>=', $startYear);
        } elseif ($endYear) {
            $query->where('year_graduated', '<=', $endYear);
        }

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('last_name', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('cellphone_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('home_address', 'like', "%{$search}%")
                    ->orWhereHas('professionalData', function ($query) use ($search) {
                        $query->where('employer', 'like', "%{$search}%")
                            ->orWhere('employer_address', 'like', "%{$search}%")
                            ->orWhere('present_position', 'like', "%{$search}%");
                    });
            });
        }

        $alumniData = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('directory', ['alumniData' => $alumniData]);
    }



   public function exportAlumniAsExcel(Request $request)
    {

        $alumniData = PersonalData::with('professionalData')
            ->orderBy('created_at')
            ->get();

        $fileName = 'alumni-directory.xls';

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

        // Optional title for the export
        echo '<h1>Alumni Directory</h1>'; 

        echo '<table>';
        echo '<tr>';
        echo '<th>No</th>';
        echo '<th>Surname</th>';
        echo '<th>First Name</th>';
        echo '<th>Email Address</th>';
        echo '<th>Contact No.</th>';
        echo '<th>Employer</th>';
        echo '<th>Employer Address</th>';
        echo '<th>Position</th>';
        echo '</tr>';

        // Populate the table with data
        foreach ($alumniData as $index => $alum) {
            echo '<tr>';
            echo '<td>' . ($index + 1) . '</td>';
            echo '<td>' . htmlspecialchars($alum->last_name) . '</td>';
            echo '<td>' . htmlspecialchars($alum->first_name) . '</td>';
            echo '<td>' . htmlspecialchars($alum->email) . '</td>';
            echo '<td>' . htmlspecialchars($alum->cellphone_number) . '</td>';
            echo '<td>' . ($alum->professionalData ? htmlspecialchars($alum->professionalData->employer) : '') . '</td>';
            echo '<td>' . ($alum->professionalData ? htmlspecialchars($alum->professionalData->employer_address) : '') . '</td>';
            echo '<td>' . ($alum->professionalData ? htmlspecialchars($alum->professionalData->present_position) : '') . '</td>';
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
