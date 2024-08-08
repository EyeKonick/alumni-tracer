<?php

namespace App\Http\Controllers\alumni\Auth;

use App\Models\Skill;
use App\Models\Alumni;
use App\Models\Course;
use App\Models\Gender;
use Illuminate\View\View;
use App\Models\SurveyData;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use App\Models\ProfessionalData;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Models\Survey; // Add this line

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $genders = Gender::all();
        $courses = Course::all();
        $skills = Skill::all();
        return view('alumni.auth.register', compact('genders', 'courses', 'skills'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function alumniRegister(Request $request): RedirectResponse
    {
        // Validation rules
        $request->validate([
            // Existing validation rules
            'question1' => ['required', 'in:Yes,No'],
            'question1_answer' => ['nullable', 'string'],
            'challenges' => 'array',
            'challenges.*' => 'string',
            'suggestions' => ['nullable', 'string'],
            'file_path' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf,doc,docx'], // Adjust as needed
        ]);

        // Create Alumni
        $alumni = Alumni::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create PersonalData
        PersonalData::create([
            'alumni_id' => $alumni->id,
            'gender' => $request->gender,
            'age' => $request->age,
            'civil_status' => $request->civil_status,
            'grad_year' => $request->grad_year,
            'grad_course' => $request->grad_course,
            'major' => $request->major,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        // Create ProfessionalData
        ProfessionalData::create([
            'alumni_id' => $alumni->id,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'present_position' => $request->present_position,
            'monthly_income' => $request->monthly_income,
            'employment_status' => $request->employment_status,
            'inclusive_from' => $request->inclusive_from,
            'inclusive_to' => $request->inclusive_to,
            'skills' => $request->input('skills', []),
        ]);

        // Create Survey
        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('survey_files');
        }

        SurveyData::create([
            'alumni_id' => $alumni->id,
            'question1' => $request->question1,
            'question1_answer' => $request->question1_answer,
            'challenges' => json_encode($request->challenges), // Store as JSON
            'suggestions' => $request->suggestions,
            'file_path' => $filePath,
        ]);

        event(new Registered($alumni));
        Auth::guard('alumni')->login($alumni);

        return redirect(route('alumni.dashboard', absolute: false));
    }


}
