<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalData;
use App\Models\ProfessionalData;
use App\Models\AlumniSurvey;
use App\Models\Gender;
use App\Models\Challenge;
use App\Models\CivilStatus;
use App\Models\Course;
use App\Models\EmploymentStatus;
use App\Models\MonthlyIncome;
use App\Models\Skill;

class SurveyController extends Controller
{
    public function showSurveyForm()
    {
        // Fetch data needed for the form
        $genders = Gender::all();
        $challenges = Challenge::all();
        $civilStatuses = CivilStatus::all();
        $courses = Course::all();
        $employmentStatuses = EmploymentStatus::all();
        $monthlyIncomes = MonthlyIncome::all();
        $skills = Skill::all();

        return view('survey.alumni_survey', compact('genders', 'challenges', 'civilStatuses', 'courses', 'employmentStatuses', 'monthlyIncomes', 'skills'));
    }

    public function submitAlumniSurveyForm(Request $request)
    {
        $request->validate([
            // Personal Data Validation
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender_id' => 'required|exists:genders,id',
            'age' => 'nullable|integer|min:1|max:120',
            'civil_status_id' => 'required|exists:civil_statuses,id',
            'year_graduated' => 'required|integer',
            'course_graduated_id' => 'required|exists:courses,id',
            'home_address' => 'required|string',
            'cellphone_number' => 'required|string|min:11|max:11',
            'email' => 'required|email|unique:personal_data,email',

            // Professional Data Validation
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'employer' => 'required|string|max:255',
            'employer_address' => 'required|string',
            'employment_status_id' => 'required|exists:employment_statuses,id',
            'present_position' => 'required|string|max:255',
            'inclusive_from' => 'required|integer',
            'inclusive_to' => 'required|integer|gte:inclusive_from',
            'monthly_income_id' => 'required|exists:monthly_incomes,id',
            'skills_used' => 'required|array',
            'skills_used.*' => 'exists:skills,id',

            // Alumni Survey Validation
            'degree_skills_in_line' => 'required|boolean',
            'additional_info_text' => 'nullable|string',
            'challenges_faced' => 'required|array',
            'challenges_faced.*' => 'exists:challenges,id',
            'suggestions' => 'required|string',
            'document_path' => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        $personalData = PersonalData::create($request->only([
            'first_name', 'middle_name', 'last_name', 'gender_id', 'age', 'civil_status_id',
            'year_graduated', 'course_graduated_id', 'home_address', 'cellphone_number', 'email'
        ]));

        $professionalData = new ProfessionalData($request->only([
            'company_name', 'company_address', 'employer', 'employer_address', 'employment_status_id',
            'present_position', 'inclusive_from', 'inclusive_to', 'monthly_income_id'
        ]));
        $professionalData->alumni_id = $personalData->id;
        $professionalData->save();

        $professionalData->skills()->sync($request->input('skills_used'));

        $filePath = null;
        if ($request->hasFile('document_path')) {
            $filePath = $request->file('document_path')->store('documents', 'public');
        }

        $alumniSurvey = new AlumniSurvey([
            'alumni_id' => $personalData->id,
            'degree_skills_in_line' => $request->degree_skills_in_line,
            'additional_info_text' => $request->additional_info_text,
            'suggestions' => $request->suggestions,
            'document_path' => $filePath,
            'challenges_faced' => $request->input('challenges_faced'),
        ]);
        $alumniSurvey->save();

        return redirect()->route('survey.complete');
    }


    public function completeSurvey()
    {
        return view('survey.complete');
    }
}
