<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\PersonalData;
use App\Models\ProfessionalData;
use App\Models\SurveyData;
use Illuminate\Http\Request;

class AlumniDisplay extends Controller
{
    // Existing displayAlumni method

    /**
     * Display detailed information for a specific alumnus.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $alumnus = Alumni::with(['personalData', 'professionalData', 'surveyData'])->findOrFail($id);

        return view('show', compact('alumnus'));
    }
}
