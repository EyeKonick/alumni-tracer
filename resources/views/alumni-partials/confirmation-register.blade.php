<div id="confirm-step" class="step hidden">
    <div class="mb-4">
        <x-input-label for="confirm_message" class="text-center" :value="__('Confirm your details')" />
        <p class="text-sm text-gray-700 text-center">Please review your details before submitting.</p>
        <p id="confirmation-details" class="p-6 shadow-lg rounded-lg mt-8"></p>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex flex-row gap-4 justify-between mt-4">
        <button type="button" id="prev-to-professional" class="w-full md:w-1/3 px-4 py-2 bg-orange-500 text-white rounded">Previous</button>
        <button type="button" id="edit-form" class="w-full md:w-1/3 px-4 py-2 bg-blue-500 text-white rounded">Edit</button>
        <button type="submit" id="submit-form" class="w-full md:w-1/3 px-4 py-2 bg-green-500 text-white rounded">Submit</button>
    </div>
</div>

