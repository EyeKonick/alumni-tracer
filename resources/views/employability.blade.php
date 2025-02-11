<x-app-layout>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Employability Tracer Data</h1>

                    <!-- Search Bar and Action Buttons -->
                    <div class="flex flex-wrap items-center mb-6 space-y-4 md:space-y-0 md:space-x-4">
                        <form action="{{ route('alumni.employability.search') }}" method="GET"
                            class="flex-grow relative w-full md:w-auto">
                            <input type="text" name="search" value="{{ request()->input('search') }}"
                                placeholder="Search..."
                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400" />
                            <button type="submit"
                                class="absolute inset-y-0 right-0 flex items-center px-4 text-white bg-red-500 hover:bg-red-600 rounded-r-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 4a7 7 0 100 14 7 7 0 000-14zm0 2a5 5 0 11-5 5 5 5 0 015-5zm6.65 11.35a1 1 0 00-1.3-.45 9.978 9.978 0 00-2.62-1.1 1 1 0 00-.64 1.89c.65.31 1.32.6 2.01.84a1 1 0 00.93-.21z" />
                                </svg>
                            </button>
                        </form>

                        <!-- Print and Export Buttons -->
                        <div class="flex space-x-2 w-full md:w-auto">
                            <button onclick="printTable()"
                                class="inline-flex items-center px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 10h12m-6-6v6M6 18h12m-6-6v6m4 4H8m4-4v4M4 8h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V10a2 2 0 012-2z" />
                                </svg>
                                <span class="ml-2 text-sm">Print</span>
                            </button>

                            <button onclick="alert('Export to Excel functionality not yet implemented')"
                                class="inline-flex items-center px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-md shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM6 2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zM10 14l2 2 2-2m-2-6v6" />
                                </svg>
                                <span class="ml-2 text-sm">Export</span>
                            </button>
                        </div>
                    </div>

                    <!-- Filters Section -->
                    <form action="{{ route('alumni.showEmployabilityTracerData') }}" method="GET"
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <!-- Course Filter -->
                        <div>
                            <label for="course" class="block text-sm font-medium text-gray-700 mb-1">Course</label>
                            <select id="course" name="course" onchange="this.form.submit()"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                                <option value="all">All Courses</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course }}"
                                        {{ request()->input('course') == $course ? 'selected' : '' }}>
                                        {{ $course }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort By Last Name -->
                        <div>
                            <label for="sort_last_name" class="block text-sm font-medium text-gray-700 mb-1">Sort by
                                Last Name</label>
                            <select id="sort_last_name" name="sort_last_name" onchange="this.form.submit()"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                                <option value="">Select</option>
                                <option value="asc"
                                    {{ request()->input('sort_last_name') == 'asc' ? 'selected' : '' }}>Ascending
                                </option>
                                <option value="desc"
                                    {{ request()->input('sort_last_name') == 'desc' ? 'selected' : '' }}>Descending
                                </option>
                            </select>
                        </div>

                        <!-- Start Year Filter -->
                        <div>
                            @php
                                $startYear = 1950;
                                $endYear = date('Y');
                            @endphp
                            <label for="start_year" class="block text-sm font-medium text-gray-700 mb-1">Start
                                Year</label>
                            <select id="start_year" name="start_year" onchange="this.form.submit()"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                                <option value="">Select Start Year</option>
                                @for ($year = $startYear; $year <= $endYear; $year++)
                                    <option value="{{ $year }}"
                                        {{ request()->input('start_year') == $year ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- End Year Filter -->
                        <div>
                            <label for="end_year" class="block text-sm font-medium text-gray-700 mb-1">End
                                Year</label>
                            <select id="end_year" name="end_year" onchange="this.form.submit()"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                                <option value="">Select End Year</option>
                                @for ($year = $startYear; $year <= $endYear; $year++)
                                    <option value="{{ $year }}"
                                        {{ request()->input('end_year') == $year ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Employment Status Filter -->
                        <div>
                            <label for="employment_status"
                                class="block text-sm font-medium text-gray-700 mb-1">Employment Status</label>
                            <select id="employment_status" name="employment_status" onchange="this.form.submit()"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">
                                <option value="all">All Statuses</option>
                                @foreach ($employmentStatuses as $status)
                                    <option value="{{ $status }}"
                                        {{ request()->input('employment_status') == $status ? 'selected' : '' }}>
                                        {{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    <!-- Error Message -->
                    @if (isset($error))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $error }}</span>
                        </div>
                    @endif

                    <!-- Employability Table -->
                    <div class="overflow-x-auto">
                        <div class="table-container max-h-[calc(100vh-16rem)] overflow-y-auto">
                            <table id="employabilityTable"
                                class="min-w-full table-auto border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border px-2 py-2 text-xs md:text-sm">No.</th>
                                        <th class="border px-2 py-2 text-xs md:text-sm">Program/Course</th>
                                        <th class="border px-2 py-2 text-xs md:text-sm">Name Of Graduate</th>
                                        <th class="border px-2 py-2 text-xs md:text-sm">Date of Graduation</th>
                                        <th class="border px-2 py-2 text-xs md:text-sm">Date Hired for Current Job</th>
                                        <th class="border px-2 py-2 text-xs md:text-sm">Status of Employment prior to
                                            graduation</th>
                                        <th class="border px-2 py-2 text-xs md:text-sm">Status of Employment after
                                            graduation</th>
                                        <th class="border px-2 py-2 text-xs md:text-sm">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumniData as $index => $data)
                                        <tr class="bg-white border-b">
                                            <td class="border px-2 py-2 text-center text-xs md:text-sm">
                                                {{ $loop->iteration }}</td>
                                            <td class="border px-2 py-2 text-xs md:text-sm">
                                                {{ $data->courseGraduated->course_name ?? 'N/A' }}</td>
                                            <td class="border px-2 py-2 text-xs md:text-sm">{{ $data->last_name }},
                                                {{ $data->first_name }}</td>
                                            <td class="border px-2 py-2 text-xs md:text-sm">
                                                {{ $data->year_graduated ?? 'N/A' }}</td>
                                            <td class="border px-2 py-2 text-xs md:text-sm">
                                                {{ $data->professionalData->inclusive_from ?? 'N/A' }}</td>
                                            <td class="border px-2 py-2 text-xs md:text-sm"></td>
                                            <td class="border px-2 py-2 text-xs md:text-sm">
                                                {{ $data->professionalData->employmentStatus->status_name ?? 'N/A' }}
                                            </td>
                                            <td class="border px-2 py-2 text-xs md:text-sm">
                                                {{ $data->professionalData->present_position ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $alumniData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Script -->
    <script>
        function printTable() {
            const printWindow = window.open('', '', 'height=600,width=800');
            const tableHTML = document.getElementById('employabilityTable').outerHTML;
            printWindow.document.write('<html><head><title>Print Table</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
            printWindow.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
            printWindow.document.write('thead { background-color: #f2f2f2; }');
            printWindow.document.write('tbody tr:nth-child(even) { background-color: #f9f9f9; }');
            printWindow.document.write('@page { size: landscape; }');
            printWindow.document.write('</style>');
            printWindow.document.write('</head><body >');
            printWindow.document.write('<h1>Employability Tracer Data</h1>');
            printWindow.document.write(tableHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
        }
    </script>
</x-app-layout>
