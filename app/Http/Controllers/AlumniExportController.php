<?php

namespace App\Http\Controllers;

use App\Exports\AlumniExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AlumniExportController extends Controller
{
    public function export(Request $request)
    {
        // return Excel::download(new AlumniExport($request->all()), 'alumni-directory.xlsx');
    }
}
