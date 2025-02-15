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
        $year = $request->input('year', null);
        $data = [];
        $totalGraduates = 0;
        $totalEmployed = 0;

        foreach ($courses as $course) {

            $graduatesQuery = PersonalData::where('course_graduated_id', $course->id);


            $employedQuery = ProfessionalData::whereIn('alumni_id', function ($query) use ($course, $year) {
                $query->select('id')
                    ->from('personal_data')
                    ->where('course_graduated_id', $course->id)
                    ->when($year, function ($q) use ($year) {
                        $q->whereYear('year_graduated', $year);
                    });
            })->where('is_employed', 1);


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


    public function exportGraduateTracerData(Request $request)
    {
        $year = $request->input('year');
        $data = $this->getGraduateTracerData($year);

        $fileName = 'graduate-tracer-data-' . ($year ? $year : 'all') . '.xls';

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        ob_start();

        echo '<html>';
        echo '<head>';
        echo '<style>';
        echo 'table { border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; }';
        echo 'th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }';
        echo 'th { background-color: #4CAF50; color: white; }';
        echo 'tr:nth-child(even) { background-color: #f2f2f2; }';
        echo 'tr.total-row { background-color: #d9ead3; font-weight: bold; }'; // Style for the total row
        echo '</style>';
        echo '</head>';
        echo '<body>';

        echo '<h1>Graduate Tracer Data</h1>';
        echo '<table>';
        echo '<tr>';
        echo '<th>Program</th>';
        echo '<th>No. of Graduates</th>';
        echo '<th>No. of Graduates Employed</th>';
        echo '<th>Percentage of Employed Graduates</th>';
        echo '</tr>';

        foreach ($data as $row) {
            $isTotalRow = $row['course'] === 'Total';
            echo '<tr' . ($isTotalRow ? ' class="total-row"' : '') . '>';
            echo '<td>' . htmlspecialchars($row['course']) . '</td>';
            echo '<td>' . htmlspecialchars($row['graduates']) . '</td>';
            echo '<td>' . htmlspecialchars($row['employed']) . '</td>';
            echo '<td>' . htmlspecialchars($row['percentage_employed']) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</body>';
        echo '</html>';

        $output = ob_get_clean();
        echo $output;
        exit;
    }

private function getGraduateTracerData($year)
{
    $courses = Course::all();
    $data = [];

    foreach ($courses as $course) {
        $graduatesQuery = PersonalData::where('course_graduated_id', $course->id);
        $employedQuery = ProfessionalData::whereIn('alumni_id', function ($query) use ($course, $year) {
            $query->select('id')
                ->from('personal_data')
                ->where('course_graduated_id', $course->id)
                ->when($year, function ($q) use ($year) {
                    $q->whereYear('year_graduated', $year);
                });
        })->where('is_employed', 1);

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
    }

    return $data;
}

}
