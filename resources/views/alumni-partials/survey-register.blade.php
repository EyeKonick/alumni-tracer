<div id="survey-step" class="step hidden">
    <h3 class="text-center">ALUMNI SURVEY</h3>

    <!-- Survey Question 1 -->
    <div class="mb-4">
        <x-input-label for="question1" :value="__('Do you think your degree and skills earned in the University is in line with your present job?')" />
        <div class="flex items-center mb-2">
            <input type="radio" id="question1_yes" name="question1" value="Yes" {{ old('question1') == 'Yes' ? 'checked' : '' }} class="mr-2">
            <label for="question1_yes" class="text-gray-600">Yes</label>
        </div>
        <div class="flex items-center mb-4">
            <input type="radio" id="question1_no" name="question1" value="No" {{ old('question1') == 'No' ? 'checked' : '' }} class="mr-2">
            <label for="question1_no" class="text-gray-600">No</label>
        </div>

        <!-- Conditional Textarea for 'No' -->
        <div id="question1_no_reason" class="{{ old('question1') == 'No' ? '' : 'hidden' }} mb-4">
            <x-input-label for="question1_answer" :value="__('If No, WHY?')" />
            <textarea id="question1_answer" name="question1_answer" rows="4" class="w-full border border-gray-300 rounded-2xl">{{ old('question1_answer') }}</textarea>
            @error('question1_answer')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Challenges Checkboxes -->
    <div class="mb-4">
        <x-input-label for="challenges" :value="__('Challenges experienced after graduation:')" />
        <div class="flex flex-col mt-1">
            <div class="flex items-center mb-2">
                <input type="checkbox" id="challenge_job_hunting" name="challenges[]" value="Job hunting" {{ in_array('Job hunting', old('challenges', [])) ? 'checked' : '' }} class="mr-2">
                <label for="challenge_job_hunting" class="text-sm text-gray-700">Job hunting</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" id="challenge_promotion" name="challenges[]" value="Promotion" {{ in_array('Promotion', old('challenges', [])) ? 'checked' : '' }} class="mr-2">
                <label for="challenge_promotion" class="text-sm text-gray-700">Promotion</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" id="challenge_personal_problem" name="challenges[]" value="Personal problem" {{ in_array('Personal problem', old('challenges', [])) ? 'checked' : '' }} class="mr-2">
                <label for="challenge_personal_problem" class="text-sm text-gray-700">Personal problem</label>
            </div>
            <!-- Add more checkboxes as needed -->
        </div>
        @error('challenges')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Suggestions Textarea -->
    <div class="mb-4">
        <x-input-label for="suggestions" :value="__('How can we improve alumni services?')" />
        <textarea id="suggestions" name="suggestions" rows="4" class="w-full border border-gray-300 rounded-2xl">{{ old('suggestions') }}</textarea>
        @error('suggestions')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- File Attachment -->
    <div class="mb-4">
        <x-input-label for="file_path" :value="__('Attach a file (e.g., Company ID):')" />
        <input type="file" id="file_path" name="file_path" class="block mt-1 w-full border border-gray-300 rounded-2xl">
        @error('file_path')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Navigation Buttons -->
    <button type="button" id="prev-to-professional" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded">Previous</button>
    <button type="button" id="next-to-confirm" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Next</button>

    <script>
        // Show or hide the 'If No, WHY?' textarea based on the radio button selection
        document.getElementById('question1_yes').addEventListener('change', function() {
            document.getElementById('question1_no_reason').classList.add('hidden');
        });

        document.getElementById('question1_no').addEventListener('change', function() {
            document.getElementById('question1_no_reason').classList.remove('hidden');
        });
    </script>
</div>
