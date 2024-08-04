<?php

namespace App\Http\Controllers\alumni\Auth;

use App\Models\Alumni;
use Illuminate\View\View;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use App\Models\ProfessionalData;
use Illuminate\Validation\Rules;
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
        return view('alumni.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function alumniRegister(Request $request): RedirectResponse
    {
        $request->validate([
            //alumni table
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Alumni::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Alumni::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            //personal_data table
            'gender' => ['required', 'string'],
            'age' => ['required', 'integer'],
            'civil_status' => ['required', 'string'],
            'grad_year' => ['required', 'integer'],
            'grad_course' => ['required', 'string'],
            'major' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string', 'regex:/^[0-9]{11}$/'],


            //professional_data table
            'company_name' => ['required','string'],
            'company_address' => ['required','string'],
            'present_position' => ['required','string'],
            'monthly_income' => ['required','string'],
            'employment_status' => ['required','string'],
            'inclusive_from' => ['required','integer'],
            'inclusive_to' => ['required','integer'],
        ]);

        $alumni = Alumni::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


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

        ProfessionalData::create([
            'alumni_id' => $alumni->id,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'present_position' => $request->present_position,
            'monthly_income' => $request->monthly_income,
            'employment_status' => $request->employment_status,
            'inclusive_from' => $request->inclusive_from,
            'inclusive_to' => $request->inclusive_to,
        ]);


        event(new Registered($alumni));

        Auth::guard('alumni')->login($alumni);

        return redirect(route('alumni.dashboard', absolute: false));
    }
}
