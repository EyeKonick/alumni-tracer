<x-app-layout>
    <div class="py-6">
        <div class="w-full mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <div class="flex items-center justify-between mb-4 flex-col">
                        @if (session('success'))
                            <div id="success-message"
                                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                                role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>

                            <script>
                                setTimeout(function() {
                                    document.getElementById('success-message').style.display = 'none';
                                }, 3000);
                            </script>
                        @endif
                        <h1 class="text-4xl font-bold my-5">Alumni Directory</h1>

                          <!-- Search Form and Action Buttons -->
                          <div class="flex items-center justify-end space-x-2 w-full mb-5">
                            <!-- Search Form -->
                            <form action="{{ route('alumni.directory.search') }}" method="GET" class="relative max-w-xs w-full">
                                <input type="text" name="search" value="{{ request()->input('search') }}"
                                    placeholder="Search..."
                                    class="block w-full px-3 py-1.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400" />
                                <button type="submit"
                                    class="absolute inset-y-0 right-0 flex items-center px-3 bg-red-500 text-white hover:bg-red-600 rounded-r-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 4a7 7 0 100 14 7 7 0 000-14zm6.65 11.35a1 1 0 00-1.3-.45 9.978 9.978 0 00-2.62-1.1 1 1 0 00-.64 1.89c.65.31 1.32.6 2.01.84a1 1 0 00.93-.21z" />
                                    </svg>
                                </button>
                            </form>

                            <!-- Print Button -->
                            <button onclick="printTable()"
                                class="inline-flex items-center px-4 py-3 text-white bg-blue-500 hover:bg-blue-600 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 10h12m-6-6v6M6 18h12m-6-6v6m4 4H8m4-4v4M4 8h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V10a2 2 0 012-2z" />
                                </svg>
                                <span class="ml-2 text-xs">Print</span>
                            </button>

                            <!-- Export to Excel Button -->
                            <a href="{{ route('alumni.export') }}"
                                class="inline-flex items-center px-4 py-3 text-white bg-green-600 hover:bg-green-700 rounded-md shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM6 2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zM10 14l2 2 2-2m-2-6v6" />
                                </svg>
                                <span class="ml-2 text-sm">Export</span>
                            </a>
                        </div>

                        <!-- Filters Section -->
                        <form action="{{ route('alumni.showDirectoryTracerData') }}" method="GET"
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6 w-full">
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
                                    @for ($year = $endYear; $year >= $startYear; $year--)
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
                                    @for ($year = $endYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}"
                                            {{ request()->input('end_year') == $year ? 'selected' : '' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </form>


                    </div>

                    <!-- Alumni Table -->
                    <div class="overflow-x-auto">
                        <div class="max-h-[calc(100vh-12rem)] overflow-y-auto">
                            <table id="alumniTable" class="min-w-full table-auto border border-gray-300">
                                <thead class="bg-gray-200 text-xs">
                                    <tr>
                                        <th class="border px-2 py-1 text-center">No.</th>
                                        <th class="w-1/12 border px-2 py-1">Surname</th>
                                        <th class="w-1/12 border px-2 py-1">First Name</th>
                                        <th class="w-3/12 border px-2 py-1">Course</th>
                                        <th class="w-1/12 border px-2 py-1">Contact No.</th>
                                        <th class="w-1/12 border px-2 py-1">Email</th>
                                        <th class="w-2/12 border px-2 py-1">Address</th>
                                        <th class="w-1/12 border px-2 py-1">Year Graduated</th>
                                        <th class="w-2/12 border px-2 py-1">Employer</th>
                                        <th class="w-2/12 border px-2 py-1">Employer Address</th>
                                        <th class="w-2/12 border px-2 py-1">Position</th>
                                        <th class="w-2/12 border px-2 py-1 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-xs">
                                    @foreach ($alumniData as $index => $alumni)
                                        <tr class="bg-white border-b">
                                            <td class="border px-2 py-1 text-center">
                                                {{ $alumniData->firstItem() + $index }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->last_name }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->first_name }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->courseGraduated->course_name ?? 'N/A' }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->cellphone_number }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->email }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->home_address }}</td>
                                            <td class="border px-2 py-1 text-center">{{ $alumni->year_graduated }}</td>
                                            <td class="border px-2 py-1">
                                                {{ optional($alumni->professionalData)->employer }}</td>
                                            <td class="border px-2 py-1">
                                                {{ optional($alumni->professionalData)->employer_address }}</td>
                                            <td class="border px-2 py-1">
                                                {{ optional($alumni->professionalData)->present_position }}</td>
                                            <td class="border px-2 py-1 text-center">
                                                <div class="flex justify-center space-x-2">
                                                    <a href="{{ route('alumni.view', $alumni->id) }}"
                                                        class="hover:bg-green-700 text-xs font-semibold text-white bg-green-600 py-1 px-2 rounded-md">View</a>
                                                    <a href="{{ route('alumni.edit', $alumni->id) }}"
                                                        class="hover:bg-blue-700 text-xs font-semibold text-white bg-blue-600 py-1 px-2 rounded-md">Edit</a>
                                                    <form action="{{ route('alumni.delete', $alumni->id) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-xs font-semibold text-white py-1 px-2 rounded-md">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-2">
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
            const tableContent = document.getElementById('alumniTable').outerHTML;

            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = tableContent;
            const rows = tempDiv.querySelectorAll('tr');
            rows.forEach(row => {
                row.removeChild(row.lastElementChild);
            });

            printWindow.document.write(`
                <html>
                <head>
                    <title>Alumni Directory</title>
                    <style>
                        /* Styling for print layout */
                        @media print {
                            body {
                                margin: 0;
                                font-family: 'Arial', sans-serif;
                            }
                            .header {
                                text-align: center;
                                margin-bottom: 20px;
                                position: relative;
                                padding-bottom: 10px;
                                border-bottom: 2px solid black;
                                margin-top: 1.5rem;
                            }
                            .header img {
                                display: block;
                                max-width: 80px;
                                max-height: 80px;
                            }
                            .header h1, .header h2, .header h3, .header p {
                                margin: 0;
                                padding: 0;
                            }
                            .header h1 {
                                font-size: 14px;
                                font-weight: normal;
                            }
                            .header h2 {
                                font-size: 26px;
                                color: blue;
                                font-weight: bold;
                            }
                            .header h3 {
                                font-size: 18px;
                                font-weight: bold;
                            }
                            .header p {
                                font-size: 12px;
                            }

                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                            }
                            th, td {
                                border: 1px solid black;
                                padding: 10px;
                                text-align: center;
                            }
                            th {
                                background-color: #f2f2f2;
                                font-weight: bold;
                            }
                            td {
                                background-color: #ffffff;
                            }
                            tr:nth-child(even) td {
                                background-color: #f9f9f9;
                            }
                            @page {
                                size: letter landscape;
                                margin: 15mm;
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="header" style="margin-top: 24px">
                        <img src="images/capsu_logo.jpg" alt="Logo" style="display: block; margin-left: auto; margin-right: auto; max-width: 80px; max-height: 80px;">
                        <h1>Republic of the Philippines</h1>
                        <h2 class="university">CAPIZ STATE UNIVERSITY</h2>
                        <h3>MAMBUSAO SATELLITE COLLEGE</h3>
                        <p>Poblacion, Mambusao, Capiz</p>
                        <p>website: www.capsu.edu.ph | email: mambusao@capsu.edu.ph</p>
                    </div>
                    <h1 style="text-align:center;">Alumni Directory</h1>
                    ${tempDiv.innerHTML} <!-- Insert modified table without the "Actions" column -->
                </body>
                </html>
            `);

            printWindow.document.close();
            const img = printWindow.document.querySelector('img');
            img.onload = function() {
                printWindow.print();
                setTimeout(function() {
                    printWindow.close();
                }, 400);
            };
        }
    </script>
</x-app-layout>
