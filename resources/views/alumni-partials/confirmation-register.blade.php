<div id="confirm-step" class="step hidden">
    <div class="mb-4">
        <x-input-label for="confirm_message" :value="__('Confirm your details')" />
        <p class="text-sm text-gray-700">Please review your details before submitting.</p>
        <p id="confirmation-details" class="mt-2"></p>
    </div>
    <button type="button" id="prev-to-professional" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded">Previous</button>
    <button id="edit-form" type="button" class="btn btn-secondary">Edit</button>
    <button type="submit" id="submit-form" class="mt-4 px-4 py-2 bg-green-500 text-white rounded">Submit</button>
</div>
