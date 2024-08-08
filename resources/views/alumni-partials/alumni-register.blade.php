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
