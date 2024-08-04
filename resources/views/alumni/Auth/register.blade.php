<x-guest-layout>
    <h2 class="text-center font-bold">Register as Alumni</h2>

    <form method="POST" action="{{ route('alumni.register') }}" id="registration-form">
        @csrf

        <!-- Alumni Register Step -->
        <div id="alumni-step" class="step">
            <div class="mb-4">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
                @error('first_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="middle_name" :value="__('Middle Name')" />
                <x-text-input id="middle_name" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="middle_name" :value="old('middle_name')" required />
                @error('middle_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="last_name" :value="old('last_name')" required />
                @error('last_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="email" name="email" :value="old('email')" required />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="password" name="password" required />
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="password" name="password_confirmation" required />
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="button" id="next-to-personal" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Next</button>
        </div>

        <!-- Personal Register Step -->
        <div id="personal-step" class="step hidden">
            <div class="mb-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" class="block mt-1 w-full border border-gray-300 rounded-2xl" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="non-binary" {{ old('gender') == 'non-binary' ? 'selected' : '' }}>Non-binary</option>
                    <option value="prefer_not_to_say" {{ old('gender') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="number" name="age" :value="old('age')" required />
                @error('age')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="civil_status" :value="__('Civil Status')" />
                <select id="civil_status" name="civil_status" class="block mt-1 w-full border border-gray-300 rounded-2xl" required>
                    <option value="" disabled selected>Select your civil status</option>
                    <option value="single" {{ old('civil_status') == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('civil_status') == 'married' ? 'selected' : '' }}>Married</option>
                    <option value="divorced" {{ old('civil_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                    <option value="widowed" {{ old('civil_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                </select>
                @error('civil_status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="grad_year" :value="__('Year of Graduation')" />
                <x-text-input id="grad_year" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="grad_year" :value="old('grad_year')" required />
                @error('grad_year')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="grad_course" :value="__('Course')" />
                <x-text-input id="grad_course" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="grad_course" :value="old('grad_course')" required />
                @error('grad_course')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="major" :value="__('Major')" />
                <x-text-input id="major" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="major" :value="old('major')" required />
                @error('major')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="address" :value="old('address')" required />
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input id="phone_number" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="phone_number" :value="old('phone_number')" required />
                @error('phone_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="skills" :value="__('Skills')" />
                <div class="flex flex-col mt-1">
                    @foreach(['communication', 'teamwork', 'problem_solving', 'initiative_and_enterprising', 'planning_and_organizing', 'self_management', 'learning', 'technical_technology'] as $skill)
                        <div class="flex items-center mt-1">
                            <input id="{{ $skill }}" type="checkbox" name="skills[]" value="{{ $skill }}" {{ in_array($skill, old('skills', [])) ? 'checked' : '' }} class="mr-2">
                            <label for="{{ $skill }}" class="text-sm text-gray-700 capitalize">{{ ucwords(str_replace('_', ' ', $skill)) }}</label>
                        </div>
                    @endforeach
                </div>
                @error('skills')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="button" id="prev-to-alumni" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded">Previous</button>
            <button type="button" id="next-to-confirm" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Next</button>
        </div>

        <!-- Confirmation Step -->
        <div id="confirm-step" class="step hidden">
            <div class="mb-4">
                <x-input-label for="confirm_message" :value="__('Confirm your details')" />
                <p class="text-sm text-gray-700">Please review your details before submitting.</p>
                <p id="confirmation-details" class="mt-2"></p>
            </div>
            <button type="button" id="prev-to-personal" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded">Previous</button>
            <button type="submit" id="submit-form" class="mt-4 px-4 py-2 bg-green-500 text-white rounded">Submit</button>
        </div>
    </form>

    <script>
        // JavaScript for form step navigation and validation
        document.addEventListener('DOMContentLoaded', function() {
            const formSteps = document.querySelectorAll('.step');
            let currentStep = 0;

            function showStep(step) {
                formSteps.forEach((formStep, index) => {
                    formStep.classList.toggle('hidden', index !== step);
                });
                currentStep = step;
            }

            function validateStep(step) {
                let isValid = true;
                const inputs = formSteps[step].querySelectorAll('input[required], select[required]');
                inputs.forEach(input => {
                    if (input.type === 'email') {
                        if (!input.value.trim() || !input.value.includes('@')) {
                            isValid = false;
                            showError(input, 'Please enter a valid email address.');
                        } else {
                            removeError(input);
                        }
                    } else if (input.type === 'password') {
                        if (!input.value.trim() || input.value.length < 8) {
                            isValid = false;
                            showError(input, 'Password must be at least 8 characters long.');
                        } else {
                            removeError(input);
                        }
                    } else if (!input.value.trim() && !input.checked) {
                        isValid = false;
                        showError(input, 'This field is required.');
                    } else {
                        removeError(input);
                    }
                });
                return isValid;
            }

            function showError(input, message) {
                let errorElement = input.parentElement.querySelector('.text-red-500');
                if (!errorElement) {
                    errorElement = document.createElement('p');
                    errorElement.className = 'text-red-500 text-sm mt-1';
                    input.parentElement.appendChild(errorElement);
                }
                errorElement.textContent = message;
            }

            function removeError(input) {
                const errorElement = input.parentElement.querySelector('.text-red-500');
                if (errorElement) {
                    errorElement.remove();
                }
            }

            document.getElementById('next-to-personal').addEventListener('click', function() {
                if (validateStep(0)) {
                    showStep(1);
                }
            });

            document.getElementById('prev-to-alumni').addEventListener('click', function() {
                showStep(0);
            });

            document.getElementById('next-to-confirm').addEventListener('click', function() {
                if (validateStep(1)) {
                    showStep(2);
                    // Add code to display confirmation details
                    const details = `
                        <strong>First Name:</strong> ${document.getElementById('first_name').value}<br>
                        <strong>Middle Name:</strong> ${document.getElementById('middle_name').value}<br>
                        <strong>Last Name:</strong> ${document.getElementById('last_name').value}<br>
                        <strong>Email:</strong> ${document.getElementById('email').value}<br>
                        <strong>Gender:</strong> ${document.getElementById('gender').value}<br>
                        <strong>Age:</strong> ${document.getElementById('age').value}<br>
                        <strong>Civil Status:</strong> ${document.getElementById('civil_status').value}<br>
                        <strong>Year of Graduation:</strong> ${document.getElementById('grad_year').value}<br>
                        <strong>Course:</strong> ${document.getElementById('grad_course').value}<br>
                        <strong>Major:</strong> ${document.getElementById('major').value}<br>
                        <strong>Address:</strong> ${document.getElementById('address').value}<br>
                        <strong>Phone Number:</strong> ${document.getElementById('phone_number').value}<br>
                        <strong>Skills:</strong> ${Array.from(document.querySelectorAll('input[name="skills[]"]:checked')).map(checkbox => checkbox.nextElementSibling.textContent).join(', ')}
                    `;
                    document.getElementById('confirmation-details').innerHTML = details;
                }
            });

            document.getElementById('prev-to-personal').addEventListener('click', function() {
                showStep(1);
            });
        });
    </script>
</x-guest-layout>
