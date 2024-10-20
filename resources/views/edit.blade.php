<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Edit Alumni Information</h1>


                    <!-- Alumni Edit Form -->
                    <form action="{{ route('alumni.update', $alumni->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- First Name -->
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name', $alumni->first_name) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @error('first_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name', $alumni->last_name) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @error('last_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" value="{{ old('email', $alumni->email) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cellphone Number -->
                        <div class="mb-4">
                            <label for="cellphone_number" class="block text-sm font-medium text-gray-700">Cellphone Number</label>
                            <input type="text" name="cellphone_number" value="{{ old('cellphone_number', $alumni->cellphone_number) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @error('cellphone_number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Home Address -->
                        <div class="mb-4">
                            <label for="home_address" class="block text-sm font-medium text-gray-700">Home Address</label>
                            <input type="text" name="home_address" value="{{ old('home_address', $alumni->home_address) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @error('home_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Employer -->
                        <div class="mb-4">
                            <label for="employer" class="block text-sm font-medium text-gray-700">Employer</label>
                            <input type="text" name="employer" value="{{ old('employer', optional($alumni->professionalData)->employer) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @error('employer')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Employer Address -->
                        <div class="mb-4">
                            <label for="employer_address" class="block text-sm font-medium text-gray-700">Employer Address</label>
                            <input type="text" name="employer_address" value="{{ old('employer_address', optional($alumni->professionalData)->employer_address) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @error('employer_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Present Position -->
                        <div class="mb-4">
                            <label for="present_position" class="block text-sm font-medium text-gray-700">Present Position</label>
                            <input type="text" name="present_position" value="{{ old('present_position', optional($alumni->professionalData)->present_position) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @error('present_position')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Alumni</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
