<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use App\Models\AlumniSurvey;
use App\Models\ProfessionalData;
use App\Models\Challenge;
use App\Models\EmploymentStatus;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function show(Request $request, $id)
    {
        $alumni = PersonalData::findOrFail($id);
        $alumniSurveys = AlumniSurvey::where('alumni_id', $id)->get();
        $challenges = Challenge::all()->pluck('challenge_name', 'id')->toArray();
        $professionalData = ProfessionalData::where('alumni_id', $id)
            ->with('employmentStatus', 'skills')
            ->first();

        if ($professionalData && !$professionalData->employmentStatus) {
            $professionalData->employmentStatus = (object) ['status_name' => 'Unemployed'];
        }

        $allSkills = Skill::all();
        $selectedSkills = $professionalData ? $professionalData->skills->pluck('id')->toArray() : [];

        return view('view_alumni', compact(
            'alumni',
            'alumniSurveys',
            'professionalData',
            'challenges',
            'allSkills',
            'selectedSkills'
        ));
    }

    public function edit(Request $request, $id)
    {
        $alumni = PersonalData::findOrFail($id);
        $alumniSurveys = AlumniSurvey::where('alumni_id', $id)->get();
        $challenges = Challenge::all()->pluck('challenge_name', 'id')->toArray();
        $employmentStatuses = EmploymentStatus::all();
        $allSkills = Skill::all();

        $professionalData = ProfessionalData::where('alumni_id', $id)
            ->with('employmentStatus', 'skills')
            ->first();

        if ($professionalData && !$professionalData->employmentStatus) {
            $professionalData->employmentStatus = (object) ['status_name' => 'Unemployed'];
        }

        $selectedSkills = $professionalData ? $professionalData->skills->pluck('id')->toArray() : [];

        return view('edit', compact(
            'alumni',
            'alumniSurveys',
            'professionalData',
            'challenges',
            'employmentStatuses',
            'allSkills',
            'selectedSkills'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cellphone_number' => 'required|regex:/^[0-9]{10,15}$/',
            'home_address' => 'required|string|max:255',
            'year_graduated' => 'required|string|max:255',
            'employment_status_id' => 'nullable|exists:employment_statuses,id',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
            'new_document_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'new_document_path_2' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'new_document_path_3' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $alumni = PersonalData::findOrFail($id);
        $alumni->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'cellphone_number' => $request->cellphone_number,
            'home_address' => $request->home_address,
            'year_graduated' => $request->year_graduated,
        ]);

        $professionalData = ProfessionalData::where('alumni_id', $id)->first();
        if (!$professionalData) {
            $professionalData = new ProfessionalData();
            $professionalData->alumni_id = $id;
        }
        $professionalData->employment_status_id = $request->employment_status_id;
        $professionalData->save();

        if ($request->has('skills')) {
            $professionalData->skills()->sync($request->skills);
        }

        $alumniSurvey = AlumniSurvey::where('alumni_id', $id)->first();
        if (!$alumniSurvey) {
            $alumniSurvey = new AlumniSurvey();
            $alumniSurvey->alumni_id = $id;
        }

        $documentFields = ['document_path', 'document_path_2', 'document_path_3'];
        foreach ($documentFields as $field) {
            $inputName = "new_{$field}";
            if ($request->hasFile($inputName)) {
                if ($alumniSurvey->$field) {
                    Storage::disk('public')->delete($alumniSurvey->$field);
                }
                $file = $request->file($inputName);
                $path = $file->store('documents', 'public');
                $alumniSurvey->$field = $path;
            }
        }
        $alumniSurvey->save();

        return redirect()->route('alumni.directory')->with('success', 'Alumni information updated successfully!');
    }

    public function deleteDocument(Request $request)
    {
        $request->validate([
            'document_path' => 'required|string',
            'field' => 'required|string|in:document_path,document_path_2,document_path_3',
        ]);

        $alumniSurvey = AlumniSurvey::where($request->field, $request->document_path)->first();

        if ($alumniSurvey) {
            if (Storage::disk('public')->exists($request->document_path)) {
                Storage::disk('public')->delete($request->document_path);
            }

            $alumniSurvey->{$request->field} = null;
            $alumniSurvey->save();

            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false], 404);
    }
}
