<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalData;

class AlumniDirectoryController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'desc');

        $alumniData = PersonalData::with('professionalData')
            ->orderBy('created_at', $sort)
            ->paginate(15);

        return view('directory', compact('alumniData', 'sort'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'desc');

        $alumniData = PersonalData::query()
            ->where('last_name', 'like', "%{$search}%")
            ->orWhere('first_name', 'like', "%{$search}%")
            ->orWhere('cellphone_number', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('home_address', 'like', "%{$search}%")
            ->orWhereHas('professionalData', function ($query) use ($search) {
                $query->where('employer', 'like', "%{$search}%")
                      ->orWhere('employer_address', 'like', "%{$search}%")
                      ->orWhere('present_position', 'like', "%{$search}%");
            })
            ->orderBy('created_at', $sort)
            ->paginate(10);

        return view('directory', ['alumniData' => $alumniData, 'sort' => $sort]);
    }


    public function exportAlumniAsExcel(Request $request)
    {
        $sort = $request->input('sort', 'desc');

        $alumniData = PersonalData::with('professionalData')
            ->orderBy('created_at', $sort)
            ->get();

        $fileName = 'alumni-directory.xls';

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        $output = fopen('php://output', 'w');

        $headers = [
            'No', 'Surname', 'First Name', 'Email Address', 'Contact No.', 
            'Employer', 'Employer Address', 'Position'
        ];
        fputcsv($output, $headers, "\t");

        foreach ($alumniData as $index => $alum) {
            $row = [
                $index + 1,
                $alum->last_name,
                $alum->first_name,
                $alum->email,
                $alum->cellphone_number,
                $alum->professionalData ? $alum->professionalData->employer : '',
                $alum->professionalData ? $alum->professionalData->employer_address : '',
                $alum->professionalData ? $alum->professionalData->present_position : ''
            ];

            fputcsv($output, $row, "\t");
        }

        fclose($output);

        exit;
    }

}
