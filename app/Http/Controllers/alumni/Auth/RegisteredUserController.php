<?php

namespace App\Http\Controllers\alumni\Auth;

use App\Models\Skill;
use App\Models\Alumni;
use App\Models\Course;
use App\Models\Gender;
use Illuminate\View\View;
use App\Models\Challenges;
use App\Models\SurveyData;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use App\Models\ProfessionalData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

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
        $challenges = Challenges::all();
        return view('alumni.auth.register', compact('genders', 'courses', 'skills', 'challenges'));
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
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnis,email',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required|string',
            'age' => 'nullable|integer',
            'civil_status' => 'nullable|string',
            'grad_year' => 'nullable|integer',
            'grad_course' => 'nullable|string',
            'major' => 'nullable|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'company_name' => 'nullable|string',
            'company_address' => 'nullable|string',
            'present_position' => 'nullable|string',
            'monthly_income' => 'nullable|numeric',
            'employment_status' => 'nullable|string',
            'inclusive_from' => 'nullable|integer',
            'inclusive_to' => 'nullable|integer',
            'skills' => 'nullable|array',
            'skills.*' => 'string',
            'question1' => ['required', 'in:Yes,No'],
            'question1_answer' => 'nullable|string',
            'challenges' => 'nullable|array',
            'challenges.*' => 'string',
            'suggestions' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx',
        ], [
            'email.unique' => 'The email address is already taken. Please use a different email.',
            'password.confirmed' => 'The password confirmation does not match.',
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

        // Handle File Upload
        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('survey_files');
        }

        // Create Survey
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
