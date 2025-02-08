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
                        Alumni Information
                    </h1>

                    <!-- Alumni Personal Data -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-semibold text-blue-700 border-b-4 border-blue-400 inline-block mb-6">
                            Personal Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
                            <p><span class="font-bold">Name:</span> {{ $alumni->first_name }} {{ $alumni->middle_name }}
                                {{ $alumni->last_name }}</p>
                            <p><span class="font-bold">Email:</span> {{ $alumni->email }}</p>
                            <p><span class="font-bold">Phone:</span> {{ $alumni->cellphone_number }}</p>
                            <p><span class="font-bold">Home Address:</span> {{ $alumni->home_address }}</p>
                            <p><span class="font-bold">Graduation Year:</span> {{ $alumni->year_graduated }}</p>
                        </div>
                    </div>

                    <!-- Alumni Survey Responses -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-semibold text-blue-700 border-b-4 border-blue-400 inline-block mb-6">
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
                                                        {{ $challenges[$challenge_id] ?? 'Unknown Challenge' }}</li>
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
                        <h2 class="text-3xl font-semibold text-blue-700 border-b-4 border-blue-400 inline-block mb-6">
                            Professional Data
                        </h2>
                        @if ($professionalData)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
                                <p><span class="font-bold">Company:</span> {{ $professionalData->company_name }}</p>
                                <p><span class="font-bold">Company Address:</span>
                                    {{ $professionalData->company_address }}</p>
                                <p><span class="font-bold">Employer:</span> {{ $professionalData->employer }}</p>
                                <p><span class="font-bold">Employer Address:</span>
                                    {{ $professionalData->employer_address }}</p>
                                <p><span class="font-bold">Employment Status:</span>
                                    {{ $professionalData->employmentStatus->status_name }}</p>
                                <p><span class="font-bold">Current Position:</span>
                                    {{ $professionalData->present_position }}</p>
                                <p><span class="font-bold">Inclusive From:</span>
                                    {{ $professionalData->inclusive_from }}
                                    <span class="font-bold">To:</span> {{ $professionalData->inclusive_to }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <p class="font-bold">Skills:</p>
                                @if ($professionalData->skills->isEmpty())
                                    <p class="text-gray-600 italic">No skills available.</p>
                                @else
                                    <ul class="list-decimal pl-6 mt-2">
                                        @foreach ($professionalData->skills as $skill)
                                            <li>{{ $skill->skill_name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @else
                            <p class="text-gray-600 italic">No professional data available.</p>
                        @endif
                    </div>

                    <!-- Documents Section -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-semibold text-blue-700 border-b-4 border-blue-400 inline-block mb-6">
                            Documents
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @if (!empty($survey->document_path))
                                <div class="border rounded-lg shadow-md p-4 flex flex-col items-center">
                                    <img src="{{ asset('storage/' . $survey->document_path) }}"
                                        class="w-full h-48 border rounded-md" frameborder="0"></img>
                                    <button onclick="openPdfModal('{{ asset('storage/' . $survey->document_path) }}')"
                                        class="hover:text-blue-700 mt-2 py-2 px-6 bg-blue-500 text-white rounded-md">
                                        View
                                    </button>
                                </div>
                            @endif
                            @if (!empty($survey->document_path_2))
                                <div class="border rounded-lg shadow-md p-4 flex flex-col items-center">
                                    <img src="{{ asset('storage/' . $survey->document_path_2) }}"
                                        class="w-full h-48 border rounded-md" frameborder="0"></img>
                                    <button
                                        onclick="openPdfModal('{{ asset('storage/' . $survey->document_path_2) }}')"
                                        class="hover:text-blue-700 mt-2 py-2 px-6 bg-blue-500 text-white rounded-md">
                                        View
                                    </button>
                                </div>
                            @endif
                            @if (!empty($survey->document_path_3))
                                <div class="border rounded-lg shadow-md p-4 flex flex-col items-center">
                                    <img src="{{ asset('storage/' . $survey->document_path_3) }}"
                                        class="w-full h-48 border rounded-md" frameborder="0"></img>
                                    <button
                                        onclick="openPdfModal('{{ asset('storage/' . $survey->document_path_3) }}')"
                                        class="hover:text-blue-700 mt-2 py-2 px-6 bg-blue-500 text-white rounded-md">
                                        View
                                    </button>
                                </div>
                            @endif
                            @if (empty($survey->document_path) && empty($survey->document_path_2) && empty($survey->document_path_3))
                                <p class="text-gray-600 italic">No documents available.</p>
                            @endif
                        </div>
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
    </script>
</x-app-layout>
