<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Alumni Details') }}
        </h2>
    </x-slot>

    <section class="relative flex flex-col px-4 w-full my-2 items-center">
        <div class="w-full max-w-7xl bg-white border border-black p-6 mt-4 text-black">
            <!-- Alumni Details -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Alumni Information</h3>
                <p><strong>First Name:</strong> {{ $alumnus->first_name }}</p>
                <p><strong>Middle Name:</strong> {{ $alumnus->middle_name }}</p>
                <p><strong>Last Name:</strong> {{ $alumnus->last_name }}</p>
                <p><strong>Email:</strong> {{ $alumnus->email }}</p>
                <p><strong>Gender:</strong> {{ $alumnus->personalData->gender }}</p>
                <p><strong>Age:</strong> {{ $alumnus->personalData->age }}</p>
                <p><strong>Civil Status:</strong> {{ $alumnus->personalData->civil_status }}</p>
                <p><strong>Grad Course:</strong> {{ $alumnus->personalData->grad_course }}</p>
                <p><strong>Grad Year:</strong> {{ $alumnus->personalData->grad_year }}</p>
                <p><strong>Major:</strong> {{ $alumnus->personalData->major }}</p>
                <p><strong>Address:</strong> {{ $alumnus->personalData->address }}</p>
                <p><strong>Phone Number:</strong> {{ $alumnus->personalData->phone_number }}</p>

                <h3 class="text-lg font-semibold mt-4 mb-2">Professional Information</h3>
                <p><strong>Company Name:</strong> {{ $alumnus->professionalData->company_name }}</p>
                <p><strong>Company Address:</strong> {{ $alumnus->professionalData->company_address }}</p>
                <p><strong>Present Position:</strong> {{ $alumnus->professionalData->present_position }}</p>
                <p><strong>Monthly Income:</strong> {{ $alumnus->professionalData->monthly_income }}</p>
                <p><strong>Employment Status:</strong> {{ $alumnus->professionalData->employment_status }}</p>
                <p><strong>Inclusive From:</strong> {{ $alumnus->professionalData->inclusive_from }}</p>
                <p><strong>Inclusive To:</strong> {{ $alumnus->professionalData->inclusive_to }}</p>

                <p><strong>Skills:</strong>
                    @php
                        $skills = $alumnus->professionalData->skills;
                        $skillsArray = is_array($skills) ? $skills : (is_string($skills) ? json_decode($skills, true) : []);
                    @endphp
                    {{ is_array($skillsArray) ? implode(', ', $skillsArray) : 'No skills recorded' }}
                </p>

                <h3 class="text-lg font-semibold mt-4 mb-2">Survey Data</h3>
                <p><strong>Question 1:</strong> {{ $alumnus->surveyData->question1 }}</p>
                <p><strong>Question 1 Answer:</strong> {{ $alumnus->surveyData->question1_answer }}</p>
                <p><strong>Challenges:</strong>
                    @php
                        $challenges = $alumnus->surveyData->challenges;
                        $challengesArray = is_array($challenges) ? $challenges : (is_string($challenges) ? json_decode($challenges, true) : []);
                    @endphp
                    {{ is_array($challengesArray) ? implode(', ', $challengesArray) : 'No challenges recorded' }}
                </p>
                <p><strong>Suggestions:</strong> {{ $alumnus->surveyData->suggestions }}</p>
                @if($alumnus->surveyData->file_path)
                    <p><strong>Attached File:</strong> <a href="{{ asset('storage/' . $alumnus->surveyData->file_path) }}" target="_blank">View File</a></p>
                @endif
            </div>

            <!-- Back Button -->
            <div class="mt-4">
                <button onclick="window.history.back()" class="px-4 py-2 bg-gray-600 text-white rounded-md shadow hover:bg-gray-500">
                    Back
                </button>
            </div>
        </div>
    </section>
</x-app-layout>
