<div id="professional-step" class="step hidden">
    <h3 class="text-center">PROFESSIONAL DATA</h3>
    <div class="mb-4">
        <x-input-label for="company_name" :value="__('Company Name')" />
        <x-text-input id="company_name" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="company_name" :value="old('company_name')" required />
        @error('company_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <x-input-label for="company_address" :value="__('Company Address')" />
        <x-text-input id="company_address" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="company_address" :value="old('company_address')" required />
        @error('company_address')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <x-input-label for="present_position" :value="__('Present Position')" />
        <x-text-input id="present_position" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="present_position" :value="old('present_position')" required />
        @error('present_position')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <x-input-label for="monthly_income" :value="__('Monthly Income')" />
        <x-text-input id="monthly_income" class="block mt-1 w-full border border-gray-300 rounded-2xl" type="text" name="monthly_income" :value="old('monthly_income')" required />
        @error('monthly_income')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <x-input-label for="employment_status" :value="__('Employment Status')" />
        <select id="employment_status" name="employment_status" class="block mt-1 w-full border border-gray-300 rounded-2xl" required>
            <option value="" disabled {{ old('employment_status') ? '' : 'selected' }}>Select your employment status</option>
            <option value="employed" {{ old('employment_status') == 'employed' ? 'selected' : '' }}>Employed</option>
            <option value="self_employed" {{ old('employment_status') == 'self_employed' ? 'selected' : '' }}>Self-Employed</option>
            <option value="unemployed" {{ old('employment_status') == 'unemployed' ? 'selected' : '' }}>Unemployed</option>
        </select>
        @error('employment_status')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <x-input-label for="inclusive_from" :value="__('Inclusive From')" />
        <div class="flex items-center">
            <select id="inclusive_from_select" name="inclusive_from" class="block mt-1 w-full border border-gray-300 rounded-2xl" required>
                <option value="" disabled {{ old('inclusive_from') ? '' : 'selected' }}>Select a year</option>
                @for ($year = date('Y'); $year >= 1900; $year--)
                    <option value="{{ $year }}" {{ old('inclusive_from') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
                <option value="other">Other</option>
            </select>
            <input id="inclusive_from_input" name="inclusive_from_custom" class="block mt-1 w-full border border-gray-300 rounded-2xl hidden" type="number" placeholder="Enter year" value="{{ old('inclusive_from') }}" />
        </div>
        @error('inclusive_from')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <x-input-label for="inclusive_to" :value="__('Inclusive To')" />
        <div class="flex items-center">
            <select id="inclusive_to_select" name="inclusive_to" class="block mt-1 w-full border border-gray-300 rounded-2xl" required>
                <option value="" disabled {{ old('inclusive_to') ? '' : 'selected' }}>Select a year</option>
                @for ($year = date('Y'); $year >= 1900; $year--)
                    <option value="{{ $year }}" {{ old('inclusive_to') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
                <option value="other">Other</option>
            </select>
            <input id="inclusive_to_input" name="inclusive_to_custom" class="block mt-1 w-full border border-gray-300 rounded-2xl hidden" type="number" placeholder="Enter year" value="{{ old('inclusive_to') }}" />
        </div>
        @error('inclusive_to')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <x-input-label for="skills" :value="__('Skills')" />
        <div class="flex flex-col mt-1">
            @foreach($skills as $skill)
                <div class="flex items-center mt-1">
                    <input id="skill_{{ $skill->id }}" type="checkbox" name="skills[]" value="{{ $skill->id }}" {{ in_array($skill->id, old('skills', [])) ? 'checked' : '' }} class="mr-2">
                    <label for="skill_{{ $skill->id }}" class="text-sm text-gray-700 capitalize">{{ ucwords(str_replace('_', ' ', $skill->name)) }}</label>
                </div>
            @endforeach
        </div>
        @error('skills')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="button" id="prev-to-personal" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded">Previous</button>
    <button type="button" id="next-to-survey" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Next</button>
</div>
