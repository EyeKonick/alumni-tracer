<div id="survey-step" class="step hidden">
    <h3 class="text-center mb-5 text-lg font-bold">ALUMNI SURVEY QUESTIONS</h3>

    <P class="text-center mb-10">
        Direction: Please answer the following questions honestly. Your answer is important to s because it will help the University improve the service delivered to our beloved stakeholder
    </P>

    <div class="flex-row md:flex mb-4 gap-4">
        <!-- Survey Question 1 -->
        <div class="mb-4 size-1/2 m-4">
            <x-input-label for="question1" class="text-center" :value="__('Do you think your degree and skills earned in the University is in line with your present job?')" />
            <div class="flex w-full justify-center">
                <div class="flex items-center mx-2">
                    <input type="radio" id="question1_yes" name="question1" value="Yes" {{ old('question1') == 'Yes' ? 'checked' : '' }} class="mr-2 ">
                    <label for="question1_yes" class="text-gray-600 font-bold">Yes</label>
                </div>
                <div class="flex items-center mx-2">
                    <input type="radio" id="question1_no" name="question1" value="No" {{ old('question1') == 'No' ? 'checked' : '' }} class="mr-2 ">
                    <label for="question1_no" class="text-gray-600 font-bold">No</label>
                </div>
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
        <div class="mb-4 size-1/2">
            <x-input-label for="challenges" class="text-center" :value="__('What are the challenges you experience after graduation?')" />
            <div class="flex flex-col mt-1">
                @foreach($challenges as $challenge)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="challenge_{{ $challenge->id }}" name="challenges[]" value="{{ $challenge->name }}" {{ in_array($challenge->name, old('challenges', [])) ? 'checked' : '' }} class="mr-2">
                        <label for="challenge_{{ $challenge->id }}" class="text-sm text-gray-700">{{ $challenge->name }}</label>
                    </div>
                @endforeach
            </div>
            @error('challenges')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex-row md:flex gap-4">
        <!-- Suggestions Textarea -->
        <div class="mb-4 size-1/2">
            <x-input-label for="suggestions" class="text-center" :value="__('What are your suggestions to the university to improve its alumni services?')" />
            <textarea id="suggestions" name="suggestions" rows="4" class="w-full border border-gray-300 rounded-2xl">{{ old('suggestions') }}</textarea>
            @error('suggestions')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- File Attachment -->
        <div class="mb-4 size-1/2">
            <x-input-label class="font-bold text-xl text-center" :value="__('Attachement')" />
            <x-input-label for="file_path" class="text-md-center" :value="__('Kindly provide an electronic copy of any of the documents such as company ID and employment certificates.')" />
            <input type="file" id="file_path" name="file_path" class="block mt-1 w-full border border-gray-300 rounded-2xl">
            @error('file_path')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <p class="text-center">
            "NOTICE"
        </p>
        <p class="text-center">
            I Have understood it's content and give my consent of processing my personal data. I understand my consent does not preclude the existence of other criteria for lawful processing of presonal data, and does not waive any rights under the Data Privacy Act of 2012 and other applicable laws.
        </p>

    </div>



    <!-- Navigation Buttons -->
    <div class="flex-row md:flex gap-4">
        <button type="button" id="prev-to-professional" class="mt-4 px-4 py-2 bg-orange-500 text-white rounded w-1/2">Previous</button>
        <button type="button" id="next-to-confirm" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded w-1/2">Next</button>
    </div>

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
