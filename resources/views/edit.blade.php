<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                <div class="p-8">

                    <!-- Back Button -->
                    <div class="mb-6">
                        <a href="{{ route('alumni.directory') }}"
                            class="hover:bg-blue-700 text-sm font-semibold text-white bg-blue-600 py-2 px-4 rounded-md shadow-md">
                            ← BACK
                        </a>
                    </div>

                    <!-- Page Title -->
                    <h1 class="text-4xl font-extrabold text-center text-blue-800 mb-10 uppercase tracking-wider">
                        Edit Alumni Information
                    </h1>

                    <!-- Alumni Personal Data -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-semibold text-blue-700 border-b-4 border-blue-400 inline-block mb-6">
                            Personal Information
                        </h2>
                        <form action="{{ route('alumni.update', $alumni->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
                                <div>
                                    <label for="first_name" class="block font-bold">First Name:</label>
                                    <input type="text" name="first_name" id="first_name"
                                        value="{{ $alumni->first_name }}" class="w-full p-2 border rounded-md">
                                </div>
                                <div>
                                    <label for="middle_name" class="block font-bold">Middle Name:</label>
                                    <input type="text" name="middle_name" id="middle_name"
                                        value="{{ $alumni->middle_name }}" class="w-full p-2 border rounded-md">
                                </div>
                                <div>
                                    <label for="last_name" class="block font-bold">Last Name:</label>
                                    <input type="text" name="last_name" id="last_name"
                                        value="{{ $alumni->last_name }}" class="w-full p-2 border rounded-md">
                                </div>
                                <div>
                                    <label for="email" class="block font-bold">Email:</label>
                                    <input type="email" name="email" id="email" value="{{ $alumni->email }}"
                                        class="w-full p-2 border rounded-md">
                                </div>
                                <div>
                                    <label for="cellphone_number" class="block font-bold">Phone:</label>
                                    <input type="text" name="cellphone_number" id="cellphone_number"
                                        value="{{ $alumni->cellphone_number }}" class="w-full p-2 border rounded-md">
                                </div>
                                <div>
                                    <label for="home_address" class="block font-bold">Home Address:</label>
                                    <input type="text" name="home_address" id="home_address"
                                        value="{{ $alumni->home_address }}" class="w-full p-2 border rounded-md">
                                </div>
                                <div>
                                    <label for="year_graduated" class="block font-bold">Graduation Year:</label>
                                    <input type="text" name="year_graduated" id="year_graduated"
                                        value="{{ $alumni->year_graduated }}" class="w-full p-2 border rounded-md">
                                </div>
                            </div>

                            <!-- Alumni Survey Responses -->
                            <div class="mb-12 mt-12">
                                <h2
                                    class="text-3xl font-semibold text-blue-700 border-b-4 border-blue-400 inline-block mb-6">
                                    Survey Responses
                                </h2>
                                @if ($alumniSurveys->isEmpty())
                                    <p class="text-gray-600 italic">No survey responses available.</p>
                                @else
                                    <ul class="list-disc pl-6 space-y-4">
                                        @foreach ($alumniSurveys as $survey)
                                            <li>
                                                <strong>Challenges Faced:</strong>
                                                @if (is_array($survey->challenges_faced) && count($survey->challenges_faced) > 0)
                                                    <ul class="list-disc pl-6">
                                                        @foreach ($survey->challenges_faced as $challenge_id)
                                                            <li class="text-gray-800">
                                                                {{ $challenges[$challenge_id] ?? 'Unknown Challenge' }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p class="text-gray-600 italic">No challenges faced.</p>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <!-- Professional Data -->
                            <div class="mb-12">
                                <h2
                                    class="text-3xl font-semibold text-blue-700 border-b-4 border-blue-400 inline-block mb-6">
                                    Professional Data
                                </h2>
                                @if ($professionalData)
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
                                        <div>
                                            <label for="company_name" class="block font-bold">Company:</label>
                                            <input type="text" name="company_name" id="company_name"
                                                value="{{ $professionalData->company_name }}"
                                                class="w-full p-2 border rounded-md">
                                        </div>
                                        <div>
                                            <label for="company_address" class="block font-bold">Company
                                                Address:</label>
                                            <input type="text" name="company_address" id="company_address"
                                                value="{{ $professionalData->company_address }}"
                                                class="w-full p-2 border rounded-md">
                                        </div>
                                        <div>
                                            <label for="employer" class="block font-bold">Employer:</label>
                                            <input type="text" name="employer" id="employer"
                                                value="{{ $professionalData->employer }}"
                                                class="w-full p-2 border rounded-md">
                                        </div>
                                        <div>
                                            <label for="employer_address" class="block font-bold">Employer
                                                Address:</label>
                                            <input type="text" name="employer_address" id="employer_address"
                                                value="{{ $professionalData->employer_address }}"
                                                class="w-full p-2 border rounded-md">
                                        </div>
                                        <div>
                                            <label for="employment_status" class="block font-bold">Employment
                                                Status:</label>
                                            <select name="employment_status_id" id="employment_status"
                                                class="w-full p-2 border rounded-md">
                                                @foreach ($employmentStatuses as $status)
                                                    <option value="{{ $status->id }}"
                                                        {{ $professionalData->employment_status_id == $status->id ? 'selected' : '' }}>
                                                        {{ $status->status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="present_position" class="block font-bold">Current
                                                Position:</label>
                                            <input type="text" name="present_position" id="present_position"
                                                value="{{ $professionalData->present_position }}"
                                                class="w-full p-2 border rounded-md">
                                        </div>
                                        <div>
                                            <label for="inclusive_from" class="block font-bold">Inclusive
                                                From:</label>
                                            <input type="date" name="inclusive_from" id="inclusive_from"
                                                value="{{ $professionalData->inclusive_from }}"
                                                class="w-full p-2 border rounded-md">
                                        </div>
                                        <div>
                                            <label for="inclusive_to" class="block font-bold">To:</label>
                                            <input type="date" name="inclusive_to" id="inclusive_to"
                                                value="{{ $professionalData->inclusive_to }}"
                                                class="w-full p-2 border rounded-md">
                                        </div>
                                    </div>

                                    <!-- Skills Section -->
                                    <div class="mt-4">
                                        <label for="skills" class="block font-bold">Skills:</label>
                                        @if ($allSkills->isEmpty())
                                            <p class="text-gray-600 italic">No skills available.</p>
                                        @else
                                            <div class="mt-2">
                                                @foreach ($allSkills as $skill)
                                                    <div class="flex items-center mb-2">
                                                        <input type="checkbox" name="skills[]"
                                                            id="skill_{{ $skill->id }}"
                                                            value="{{ $skill->id }}" class="mr-2"
                                                            {{ in_array($skill->id, $selectedSkills) ? 'checked' : '' }}>
                                                        <label for="skill_{{ $skill->id }}" class="text-gray-800">
                                                            {{ $skill->skill_name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <p class="text-gray-600 italic">No professional data available.</p>
                                @endif
                            </div>

                            <!-- Documents Section -->
                            <div class="mb-12">
                                <h2
                                    class="text-3xl font-semibold text-blue-700 border-b-4 border-blue-400 inline-block mb-6">
                                    Documents
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @php
                                        $uploadedDocuments = [
                                            'document_path' => !empty($survey->document_path),
                                            'document_path_2' => !empty($survey->document_path_2),
                                            'document_path_3' => !empty($survey->document_path_3),
                                        ];
                                        $availableSlots = array_filter(
                                            $uploadedDocuments,
                                            fn($isOccupied) => !$isOccupied,
                                        );
                                    @endphp

                                    @if (!empty($survey->document_path))
                                        <div class="border rounded-lg shadow-md p-4 flex flex-col items-center">
                                            <img src="{{ asset('storage/' . $survey->document_path) }}"
                                                class="w-full h-48 border rounded-md" frameborder="0"></img>
                                            <div class="flex gap-4">
                                                <button type="button"
                                                    onclick="openPdfModal('{{ asset('storage/' . $survey->document_path) }}')"
                                                    class="hover:text-blue-700 mt-2 py-2 px-6 bg-blue-500 text-white rounded-md">
                                                    View
                                                </button>
                                                <button type="button"
                                                    onclick="deleteDocument('{{ $survey->document_path }}', 'document_path')"
                                                    class="hover:text-blue-700 mt-2 py-2 px-6 bg-red-500 text-white rounded-md">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($survey->document_path_2))
                                        <div class="border rounded-lg shadow-md p-4 flex flex-col items-center">
                                            <img src="{{ asset('storage/' . $survey->document_path_2) }}"
                                                class="w-full h-48 border rounded-md" frameborder="0"></img>
                                            <div class="flex gap-4">
                                                <button type="button"
                                                    onclick="openPdfModal('{{ asset('storage/' . $survey->document_path_2) }}')"
                                                    class="hover:text-blue-700 mt-2 py-2 px-6 bg-blue-500 text-white rounded-md">
                                                    View
                                                </button>
                                                <button type="button"
                                                    onclick="deleteDocument('{{ $survey->document_path_2 }}', 'document_path_2')"
                                                    class="hover:text-blue-700 mt-2 py-2 px-6 bg-red-500 text-white rounded-md">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($survey->document_path_3))
                                        <div class="border rounded-lg shadow-md p-4 flex flex-col items-center">
                                            <img src="{{ asset('storage/' . $survey->document_path_3) }}"
                                                class="w-full h-48 border rounded-md" frameborder="0"></img>
                                            <div class="flex gap-4">
                                                <button type="button"
                                                    onclick="openPdfModal('{{ asset('storage/' . $survey->document_path_3) }}')"
                                                    class="hover:text-blue-700 mt-2 py-2 px-6 bg-blue-500 text-white rounded-md">
                                                    View
                                                </button>
                                                <button type="button"
                                                    onclick="deleteDocument('{{ $survey->document_path_3 }}', 'document_path_3')"
                                                    class="hover:text-blue-700 mt-2 py-2 px-6 bg-red-500 text-white rounded-md">
                                                    Delete
                                                </button>
                                            </div>
                                    @endif
                                    @if (count($availableSlots) === 0)
                                        <p class="text-gray-600 italic">No document slot left</p>
                                    @endif
                                </div>
                                <div class="mt-6">
                                    @foreach ($availableSlots as $slot => $isOccupied)
                                        <label for="new_{{ $slot }}" class="block font-bold">Upload New
                                            {{ ucfirst(str_replace('_', ' ', $slot)) }}:</label>
                                        <input type="file" name="new_{{ $slot }}"
                                            id="new_{{ $slot }}" class="w-full p-2 border rounded-md mb-4">
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                    class="bg-blue-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-700">
                                    Update Alumni
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Viewing PDF -->
    <div id="pdfModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-4xl">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Document Preview</h2>
                <button class="close-modal text-red-500 font-semibold hover:text-red-700">Close ✖</button>
            </div>
            <img id="pdfIframe" class="w-full h-[80vh] border rounded-md" src="" frameborder="0"></img>
        </div>
    </div>

    <script>
        function openPdfModal(pdfUrl) {
            const modal = document.getElementById('pdfModal');
            const iframe = document.getElementById('pdfIframe');

            iframe.src = pdfUrl;
            modal.classList.remove('hidden');

            document.querySelector('.close-modal').onclick = function() {
                modal.classList.add('hidden');
                iframe.src = '';
            };

            modal.onclick = function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                    iframe.src = '';
                }
            };
        }

        function deleteDocument(documentPath, field) {
            if (confirm('Are you sure you want to delete this document?')) {
                fetch('{{ route('alumni.deleteDocument') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            document_path: documentPath,
                            field: field // Pass the field to identify which document to delete
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Document deleted successfully');
                            location.reload(); // Refresh the page
                        } else {
                            alert('Error deleting document');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>
</x-app-layout>
