<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Survey</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
        <form id="surveyForm" method="POST" action="{{ route('survey.submit') }}" enctype="multipart/form-data">
            @csrf

            <!-- Step 1: Personal Data -->
            <div id="step1" class="step">
                <h2 class="text-2xl mb-6 text-center font-semibold text-gray-800">Personal Data</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="mt-1 block w-full p-3 border rounded-md @error('first_name') border-red-500 @enderror" required>
                        @error('first_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Middle Name -->
                    <div>
                        <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" class="mt-1 block w-full p-3 border rounded-md @error('middle_name') border-red-500 @enderror">
                        @error('middle_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="mt-1 block w-full p-3 border rounded-md @error('last_name') border-red-500 @enderror" required>
                        @error('last_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender_id" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="gender_id" name="gender_id" class="mt-1 block w-full p-3 border rounded-md @error('gender_id') border-red-500 @enderror" required>
                            <option value="">Select Gender</option>
                            @foreach($genders as $gender)
                                <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                                    {{ $gender->gender_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('gender_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Age -->
                    <div>
                        <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                        <input type="number" id="age" name="age" value="{{ old('age') }}" class="mt-1 block w-full p-3 border rounded-md @error('age') border-red-500 @enderror" required>
                        @error('age')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Civil Status -->
                    <div>
                        <label for="civil_status_id" class="block text-sm font-medium text-gray-700">Civil Status</label>
                        <select id="civil_status_id" name="civil_status_id" class="mt-1 block w-full p-3 border rounded-md @error('civil_status_id') border-red-500 @enderror" required>
                            <option value="">Select Civil Status</option>
                            @foreach($civilStatuses as $status)
                                <option value="{{ $status->id }}" {{ old('civil_status_id') == $status->id ? 'selected' : '' }}>{{ $status->status_name }}</option>
                            @endforeach
                        </select>
                        @error('civil_status_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Year Graduated -->
                    <div>
                        <label for="year_graduated" class="block text-sm font-medium text-gray-700">Year Graduated</label>
                        <input type="number" id="year_graduated" name="year_graduated" value="{{ old('year_graduated') }}" class="mt-1 block w-full p-3 border rounded-md @error('year_graduated') border-red-500 @enderror" required>
                        @error('year_graduated')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Home Address -->
                    <div>
                        <label for="home_address" class="block text-sm font-medium text-gray-700">Home Address</label>
                        <input type="text" id="home_address" name="home_address" value="{{ old('home_address') }}" class="mt-1 block w-full p-3 border rounded-md @error('home_address') border-red-500 @enderror" required>
                        @error('home_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Course Graduated -->
                    <div class="col-span-2">
                        <label for="course_graduated_id" class="block text-sm font-medium text-gray-700">Course Graduated</label>
                        <select id="course_graduated_id" name="course_graduated_id" class="mt-1 block w-full p-3 border rounded-md @error('course_graduated_id') border-red-500 @enderror" required>
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_graduated_id') == $course->id ? 'selected' : '' }}>{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                        @error('course_graduated_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Cellphone Number -->
                    <div>
                        <label for="cellphone_number" class="block text-sm font-medium text-gray-700">Cellphone Number</label>
                        <input type="text" id="cellphone_number" name="cellphone_number" value="{{ old('cellphone_number') }}" class="mt-1 block w-full p-3 border rounded-md @error('cellphone_number') border-red-500 @enderror" required>
                        @error('cellphone_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full p-3 border rounded-md @error('email') border-red-500 @enderror" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Reminder Text -->
                @if ($errors->any())
                    <div class="mt-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                        <p class="font-bold">Reminder</p>
                        <p>It looks like there are some errors in your input. Please review and correct the fields marked in red.</p>
                        <p class="font-bold">{{ $errors }}</p>
                    </div>
                @endif

                <!-- Navigation Buttons -->
                <div class="flex justify-end mt-6">
                    <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded-md" id="next1">Next</button>
                </div>
            </div>

            <!-- Step 2: Professional Data -->
            <div id="step2" class="step hidden">
                <h2 class="text-2xl mb-6 text-center font-semibold text-gray-800">Professional Data</h2>

                <!-- Employment Status -->

                <div>
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input
                            type="radio"
                            id="is_employed_yes"
                            name="is_employed"
                            value="1"
                            class="hidden peer"
                            {{ old('is_employed') == '1' ? 'checked' : '' }}>
                        <span
                            class="w-5 h-5 border-2 border-gray-300 rounded-md flex items-center justify-center peer-checked:bg-green-500 peer-checked:border-green-500">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-white hidden peer-checked:block"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span>Employed</span>
                    </label>
                </div>

                <div>
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input
                            type="radio"
                            id="is_employed_no"
                            name="is_employed"
                            value="0"
                            class="hidden peer"
                            {{ old('is_employed') == '0' ? 'checked' : '' }}>
                        <span
                            class="w-5 h-5 border-2 border-gray-300 rounded-md flex items-center justify-center peer-checked:bg-red-500 peer-checked:border-red-500">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-white hidden peer-checked:block"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span>Unemployed</span>
                    </label>
                </div>


                {{-- <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" id="is_employed_no" name="is_employed" value="0" {{ old('is_employed') ? 'checked' : '' }}>
                        <span class="ml-2">Not Employed</span>
                    </label>
                </div> --}}


                <div id="employment_status_section" style="display: none;">
                    <!-- Company Information -->
                    <div class="mb-6">
                        <h3 class="text-xl font-medium text-gray-700 mb-4">Company Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Company Name -->
                            <div>
                                <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" class="mt-1 block w-full p-3 border rounded-md @error('company_name') border-red-500 @enderror">
                                @error('company_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Company Address -->
                            <div>
                                <label for="company_address" class="block text-sm font-medium text-gray-700">Company Address</label>
                                <input type="text" id="company_address" name="company_address" value="{{ old('company_address') }}" class="mt-1 block w-full p-3 border rounded-md @error('company_address') border-red-500 @enderror">
                                @error('company_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Employment Details -->
                    <div class="mb-6">
                        <h3 class="text-xl font-medium text-gray-700 mb-4">Employment Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Employer -->
                            <div>
                                <label for="employer" class="block text-sm font-medium text-gray-700">Employer</label>
                                <input type="text" id="employer" name="employer" value="{{ old('employer') }}" class="mt-1 block w-full p-3 border rounded-md @error('employer') border-red-500 @enderror">
                                @error('employer')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Employer Address -->
                            <div>
                                <label for="employer_address" class="block text-sm font-medium text-gray-700">Employer Address</label>
                                <input type="text" id="employer_address" name="employer_address" value="{{ old('employer_address') }}" class="mt-1 block w-full p-3 border rounded-md @error('employer_address') border-red-500 @enderror">
                                @error('employer_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="employment_status_id" class="block text-sm font-medium text-gray-700">Employment Status</label>
                                <select id="employment_status_id" name="employment_status_id" class="mt-1 block w-full p-3 border rounded-md @error('employment_status_id') border-red-500 @enderror">
                                    <option value="">Select Status</option>
                                    @foreach($employmentStatuses as $status)
                                        <option value="{{ $status->id }}" {{ old('employment_status_id') == $status->id ? 'selected' : '' }}>{{ $status->status_name }}</option>
                                    @endforeach
                                </select>
                                @error('employment_status_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Present Position -->
                            <div>
                                <label for="present_position" class="block text-sm font-medium text-gray-700">Present Position</label>
                                <input type="text" id="present_position" name="present_position" value="{{ old('present_position') }}" class="mt-1 block w-full p-3 border rounded-md @error('present_position') border-red-500 @enderror">
                                @error('present_position')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Inclusive From -->
                            <div>
                                <label for="inclusive_from" class="block text-sm font-medium text-gray-700">Inclusive From</label>
                                <input type="number" id="inclusive_from" name="inclusive_from" value="{{ old('inclusive_from') }}" class="mt-1 block w-full p-3 border rounded-md @error('inclusive_from') border-red-500 @enderror">
                                @error('inclusive_from')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Inclusive To -->
                            <div>
                                <label for="inclusive_to" class="block text-sm font-medium text-gray-700">Inclusive To</label>
                                <input type="number" id="inclusive_to" name="inclusive_to" value="{{ old('inclusive_to') }}" class="mt-1 block w-full p-3 border rounded-md @error('inclusive_to') border-red-500 @enderror">
                                @error('inclusive_to')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Monthly Income -->
                            <div>
                                <label for="monthly_income_id" class="block text-sm font-medium text-gray-700">Monthly Income</label>
                                <select id="monthly_income_id" name="monthly_income_id" class="mt-1 block w-full p-3 border rounded-md @error('monthly_income_id') border-red-500 @enderror">
                                    <option value="">Select Income Range</option>
                                    @foreach($monthlyIncomes as $income)
                                        <option value="{{ $income->id }}" {{ old('monthly_income_id') == $income->id ? 'selected' : '' }}>{{ $income->income_range }}</option>
                                    @endforeach
                                </select>
                                @error('monthly_income_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Skills Used -->
                    <div class="mb-6">
                        <h3 class="text-xl font-medium text-gray-700 mb-2">SKILLS GAINED AND USED IN THE WORKPLACE</h3>
                        <h6 class="mb-4">Direction: Kindly check (✅) the following skills gained and used in the present job.</h6>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach($skills as $skill)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="skills_used[]" value="{{ $skill->id }}" {{ in_array($skill->id, old('skills_used', [])) ? 'checked' : '' }} class="form-checkbox">
                                        <span class="ml-2">{{ $skill->skill_name }}</span>
                                    </label>
                                </div>
                            @endforeach
                            @error('skills_used')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            @error('skills_used.*')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-6">
                    <button type="button" class="bg-gray-500 text-white px-6 py-2 rounded-md" id="prev1">Previous</button>
                    <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded-md" id="next2">Next</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" id="submit_not_employed">Submit</button>
                </div>
            </div>


            <!-- Step 3: Additional Data -->
            <div id="step3" class="step hidden">
                <h2 class="text-2xl mb-6 text-center font-semibold text-gray-800">Alumni Survey Data</h2>

                <!-- Degree Skills In Line -->
                <div class="mb-6">
                    <h3 class="text-xl font-medium text-gray-700 mb-2">Alumni Survey question</h3>
                    <h6 class="mb-4">Direction: Please answer the following questions honestly. Your answer is important to us because it will help the university improve the service delivered to our beloved stakeholders.</h6>
                    <label for="degree_skills_in_line" class="block text-md font-medium text-gray-700">
                        Are the skills you acquired during your degree in line with your current job?
                    </label>
                    <div class="mt-2 flex items-center space-x-4">
                        <div class="flex items-center">
                            <input type="radio" id="degree_skills_in_line_yes" name="degree_skills_in_line" value="1"
                                   class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                   {{ old('degree_skills_in_line') == '1' ? 'checked' : '' }}
                                   onclick="toggleTextArea(false)" />
                            <label for="degree_skills_in_line_yes" class="ml-2 block text-sm text-gray-900">Yes</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="degree_skills_in_line_no" name="degree_skills_in_line" value="0"
                                   class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                   {{ old('degree_skills_in_line') == '0' ? 'checked' : '' }}
                                   onclick="toggleTextArea(true)" />
                            <label for="degree_skills_in_line_no" class="ml-2 block text-sm text-gray-900">No</label>
                        </div>
                    </div>
                    <div id="additional_info" class="mt-4 hidden">
                        <label for="additional_info_text" class="block text-sm font-medium text-gray-700">
                            If NO, why not
                        </label>
                        <textarea id="additional_info_text" name="additional_info_text" rows="4"
                                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500">
                            {{ old('additional_info_text') }}
                        </textarea>
                        @error('additional_info_text')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    @error('degree_skills_in_line')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Challenges Faced -->
                <div class="mb-6">
                    <label class="block text-md font-medium text-gray-700 mb-4"> What are the challenges you experience after graduation? check (✅) as many challenges you encountered that really affect you.  <span class="text-red-600">*</span></label>
                    <div class="mt-1">
                        @foreach ($challenges as $challenge)
                            <div class="flex items-center">
                                <input
                                    id="challenge_{{ $challenge->id }}"
                                    name="challenges_faced[]"
                                    type="checkbox"
                                    value="{{ $challenge->id }}"
                                    {{ in_array($challenge->id, old('challenges_faced', [])) ? 'checked' : '' }}
                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                />
                                <label for="challenge_{{ $challenge->id }}" class="ml-2 block text-sm text-gray-900">
                                    {{ $challenge->challenge_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('challenges_faced')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Suggestions -->
                <div class="mb-6">
                    <label for="suggestions" class="block text-md font-medium text-gray-700">What are the suggestions to the university to improved its alumni services.</label>
                    <textarea id="suggestions" name="suggestions" class="mt-1 block w-full p-3 border rounded-md @error('suggestions') border-red-500 @enderror">{{ old('suggestions') }}</textarea>
                    @error('suggestions')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Document Upload -->
                <div class="mb-6">
                    <label for="document_path" class="block text-sm font-medium text-gray-700">Upload Supporting Document (Optional)</label>
                    <input type="file" id="document_path" name="document_path" class="mt-1 block w-full p-3 border rounded-md @error('document_path') border-red-500 @enderror">
                    @error('document_path')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Document Upload 2 -->
                <div class="mb-6">
                    <label for="document_path" class="block text-sm font-medium text-gray-700">Upload Supporting Document (Optional)</label>
                    <input type="file" id="document_path_2" name="document_path_2" class="mt-1 block w-full p-3 border rounded-md @error('document_path_2') border-red-500 @enderror">
                    @error('document_path_2')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Document Upload 3 -->
                <div class="mb-6">
                    <label for="document_path" class="block text-sm font-medium text-gray-700">Upload Supporting Document (Optional)</label>
                    <input type="file" id="document_path_3" name="document_path_3" class="mt-1 block w-full p-3 border rounded-md @error('document_path_3') border-red-500 @enderror">
                    @error('document_path_3')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-6">
                    <button type="button" class="bg-gray-500 text-white px-6 py-2 rounded-md" id="prev2">Previous</button>
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md">Submit</button>
                </div>
            </div>

        </form>
    </div>

    <script>

        function toggleTextArea(show) {
                const additionalInfo = document.getElementById('additional_info');
                if (show) {
                    additionalInfo.classList.remove('hidden');
                } else {
                    additionalInfo.classList.add('hidden');
                }
            }

            // Initialize the state based on the preselected option if any
            document.addEventListener('DOMContentLoaded', function() {
                const isNoSelected = document.getElementById('degree_skills_in_line_no').checked;
                toggleTextArea(isNoSelected);
            });

        document.addEventListener('DOMContentLoaded', function () {

            const isEmployedYes = document.getElementById('is_employed_yes');
            const isEmployedNo = document.getElementById('is_employed_no');
            const submitButtonSection = document.getElementById('submit_not_employed');
            const nextButtonSection = document.getElementById('next2');
            //initialized
            var employmentStatusSection = document.getElementById('employment_status_section');

            function toggleButtons() {
                if (isEmployedNo.checked) {
                    submitButtonSection.classList.remove('hidden');
                    nextButtonSection.classList.add('hidden');
                    employmentStatusSection.style.display = 'none';
                } else if (isEmployedYes.checked) {
                    submitButtonSection.classList.add('hidden');
                    nextButtonSection.classList.remove('hidden');
                    employmentStatusSection.style.display = 'block';
                } else {
                    employmentStatusSection.style.display = 'none';
                    submitButtonSection.classList.add('hidden');
                    nextButtonSection.classList.add('hidden');
                }
            }

            isEmployedYes.addEventListener('change', function () {
                if (isEmployedYes.checked) {
                    isEmployedNo.checked = false;
                    toggleButtons();
                }
            });

            isEmployedNo.addEventListener('change', function () {
                if (isEmployedNo.checked) {
                    isEmployedYes.checked = false;
                    toggleButtons();
                }
            });

            toggleButtons();


            const steps = document.querySelectorAll('.step');
            let currentStep = 0;

            function showStep(stepIndex) {
                steps.forEach((step, index) => {
                    step.classList.toggle('hidden', index !== stepIndex);
                });
            }

            function validateStep(stepIndex) {
                const currentStepElement = steps[stepIndex];
                const inputs = currentStepElement.querySelectorAll('input, select, textarea');
                let valid = true;

                inputs.forEach(input => {
                    if (input.hasAttribute('required') && !input.value.trim()) {
                        valid = false;
                        input.classList.add('border-red-500');
                    } else {
                        input.classList.remove('border-red-500');
                    }
                });

                return valid;
            }

            document.getElementById('next1').addEventListener('click', function () {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            document.getElementById('prev1').addEventListener('click', function () {
                currentStep--;
                showStep(currentStep);
            });

            document.getElementById('next2').addEventListener('click', function () {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            document.getElementById('prev2').addEventListener('click', function () {
                currentStep--;
                showStep(currentStep);
            });

            showStep(currentStep);
        });
    </script>
</body>
</html>
