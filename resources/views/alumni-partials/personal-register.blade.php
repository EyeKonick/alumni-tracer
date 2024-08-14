<div id="personal-step" class="step hidden w-full max-w-4xl mx-auto">

    <div class="flex-row md:flex gap-4">
        <!-- Previous Button -->
        <button type="button" id="prev-to-alumni" class="py-2 bg-orange-500 text-white rounded w-24">Previous</button>
        <!-- Column 1 -->
        <div class="flex-1 space-y-4">
            <div class="mb-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" class="block mt-1 w-full border-2 border-green-300 rounded-xl " required>
                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select your gender</option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}" {{ old('gender') == $gender->id ? 'selected' : '' }}>
                            {{ $gender->name }}
                        </option>
                    @endforeach
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
                <select id="civil_status" name="civil_status" class="block mt-1 w-full border-2 border-green-300 rounded-xl" required>
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
                <div class="flex items-center">
                    <select id="year_select" name="grad_year" class="block mt-1 w-full border-2 border-green-300 rounded-xl" required>
                        <option value="">Select a year</option>
                        @for ($year = date('Y'); $year >= 1900; $year--)
                            <option value="{{ $year }}" {{ old('grad_year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endfor
                        <option value="other">Other</option>
                    </select>
                    <input id="year_input" name="grad_year_custom" class="block mt-1 w-full border-2 border-green-300 rounded-xl hidden" type="text" placeholder="Enter year" value="{{ old('grad_year') }}" />
                </div>
                @error('grad_year')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Column 2 -->
        <div class="flex-1 space-y-4">
            <div class="mb-4">
                <x-input-label for="grad_course" :value="__('Course')" />
                <select id="grad_course" name="grad_course" class="block mt-1 w-full border-2 border-green-300 rounded-xl" required>
                    <option value="" disabled {{ old('grad_course') ? '' : 'selected' }}>Select your course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ old('grad_course') == $course->id ? 'selected' : '' }}>
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>
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
        </div>

        <!-- Next Button -->
        <button type="button" id="next-to-professional" class="py-2 bg-blue-500 text-white rounded w-24">Next</button>
</div>
</div>
