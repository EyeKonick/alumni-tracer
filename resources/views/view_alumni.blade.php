<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <a href="{{ route('alumni.directory') }}" class="hover:bg-blue-700 text-m font-semibold text-white bg-blue-600 py-2 px-2 rounded-md">BACK</a>
                    </div>

                    <h1 class="text-2xl font-bold mb-6">View Alumni Information</h1>

                    <!-- Alumni Personal Data -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">Personal Information</h2>
                        <p><strong>Name:</strong> {{ $alumni->first_name }} {{ $alumni->middle_name }} {{ $alumni->last_name }}</p>
                        <p><strong>Email:</strong> {{ $alumni->email }}</p>
                        <p><strong>Phone:</strong> {{ $alumni->cellphone_number }}</p>
                        <p><strong>Home Address:</strong> {{ $alumni->home_address }}</p>
                        <p><strong>Graduation Year:</strong> {{ $alumni->year_graduated }}</p>
                    </div>

                    <!-- Alumni Survey Responses -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">Survey Responses</h2>
                        @if($alumniSurveys->isEmpty())
                            <p>No survey responses available.</p>
                        @else
                            <ul>
                                @foreach($alumniSurveys as $survey)
                                    <li>
                                        <strong>Challenges Faced:</strong>
                                        @if(is_array($survey->challenges_faced) && count($survey->challenges_faced) > 0)
                                            <ul>
                                                @foreach($survey->challenges_faced as $challenge_id)
                                                    @php
                                                        $challenge_name = $challenges[$challenge_id] ?? 'Unknown Challenge';
                                                    @endphp
                                                    <li>{{ htmlspecialchars($challenge_name) }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>No challenges faced</p>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- Professional Data Documents -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">Documents</h2>
                        <ul>
                            @if(!empty($survey->document_path))
                                <li>
                                    <a href="javascript:void(0)" 
                                       onclick="openPdfModal('{{ asset('storage/' . $survey->document_path) }}')" 
                                       class="text-blue-500 underline">View</a> Document 1
                                </li>
                            @endif
                        
                            @if(!empty($survey->document_path_2))
                                <li>
                                    <a href="javascript:void(0)" 
                                       onclick="openPdfModal('{{ asset('storage/' . $survey->document_path_2) }}')" 
                                       class="text-blue-500 underline">View</a> Document 2
                                </li>
                            @endif
                        
                            @if(!empty($survey->document_path_3))
                                <li>
                                    <a href="javascript:void(0)" 
                                       onclick="openPdfModal('{{ asset('storage/' . $survey->document_path_3) }}')" 
                                       class="text-blue-500 underline">View</a> Document 3
                                </li>
                            @endif
                        
                            @if(empty($survey->document_path) && empty($survey->document_path_2) && empty($survey->document_path_3))
                                <li>No documents available.</li>
                            @endif
                        </ul>
                    </div>



                    <!-- Professional Data -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">Professional Data</h2>
                        @if($professionalData)
                            <p><strong>Company:</strong> {{ $professionalData->company_name }}</p>
                            <p><strong>Company Address:</strong> {{ $professionalData->company_address }}</p>
                            <p><strong>Employer:</strong> {{ $professionalData->employer }}</p>
                            <p><strong>Employer Address:</strong> {{ $professionalData->employer_address }}</p>
                            <p><strong>Employment Status:</strong> {{ $professionalData->employmentStatus->status_name }}</p>
                            <p><strong>Current Position:</strong> {{ $professionalData->present_position }}</p>
                            <p><strong>Inlusive From:</strong> {{ $professionalData->inclusive_from }} <strong>Inlusive To:</strong> {{ $professionalData->inclusive_to }}</p>
                            
                            <!-- Display Skills -->
                            <p><strong>Skills:</strong></p>
                            @if($professionalData->skills->isEmpty())
                                <p>No skills available.</p>
                            @else
                                <ol>
                                    @foreach($professionalData->skills as $skill)
                                        <li>{{ $loop->iteration }}. {{ $skill->skill_name }}</li>
                                    @endforeach
                                </ol>                            
                            @endif
                        @else
                            <p>No professional data available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Viewing PDF -->
    <div id="pdfModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-4 rounded-lg">
            <button class="close-modal">Close</button>
            <iframe id="pdfIframe" class="w-full h-96" src="" frameborder="0"></iframe>
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
            }
            
            modal.onclick = function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                    iframe.src = '';
                }
            }
        }
    </script>    
</x-app-layout>