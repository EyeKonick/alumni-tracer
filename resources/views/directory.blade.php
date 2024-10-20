<x-app-layout>
    <div class="py-6">
        <div class="w-full mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-xl font-bold">Alumni Directory</h1>

                            <!-- Success Message with Auto Dismiss -->
                        @if(session('success'))
                            <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>

                            <!-- JavaScript to auto-hide the message after 5 seconds -->
                            <script>
                                setTimeout(function() {
                                    document.getElementById('success-message').style.display = 'none';
                                }, 5000); // 5000ms = 5 seconds
                            </script>
                        @endif


                        <!-- Search and Print Controls -->
                        <div class="flex items-center space-x-2">
                            <!-- Search Form -->
                            <form action="{{ route('alumni.search') }}" method="GET" class="relative max-w-xs w-full">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request()->input('search') }}"
                                    placeholder="Search..."
                                    class="block w-full px-3 py-1.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400"
                                />
                                <button
                                    type="submit"
                                    class="absolute inset-y-0 right-0 flex items-center px-3 bg-red-500 text-white hover:bg-red-600 rounded-r-md"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a7 7 0 100 14 7 7 0 000-14zm6.65 11.35a1 1 0 00-1.3-.45 9.978 9.978 0 00-2.62-1.1 1 1 0 00-.64 1.89c.65.31 1.32.6 2.01.84a1 1 0 00.93-.21z" />
                                    </svg>
                                </button>
                            </form>

                            <!-- Print Button -->
                            <button onclick="printTable()" class="inline-flex items-center px-3 py-1 text-white bg-blue-500 hover:bg-blue-600 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 10h12m-6-6v6M6 18h12m-6-6v6m4 4H8m4-4v4M4 8h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V10a2 2 0 012-2z" />
                                </svg>
                                <span class="ml-1 text-xs">Print</span>
                            </button>

                            <!-- Export to Excel Button -->
                            <button onclick="alert('Export to Excel functionality not yet implemented')" class="inline-flex items-center px-3 py-1 text-white bg-green-600 hover:bg-green-700 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM6 2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zM10 14l2 2 2-2m-2-6v6" />
                                </svg>
                                <span class="ml-1 text-xs">Export</span>
                            </button>
                        </div>
                    </div>

                    <!-- Alumni Table -->
                    <div class="overflow-x-auto">
                        <div class="max-h-[calc(100vh-12rem)] overflow-y-auto">
                            <table id="alumniTable" class="min-w-full table-auto border border-gray-300">
                                <thead class="bg-gray-200 text-xs">
                                    <tr>
                                        <th class="w-1/12 border px-2 py-1 text-center">No.</th>
                                        <th class="w-2/12 border px-2 py-1">Surname</th>
                                        <th class="w-2/12 border px-2 py-1">First Name</th>
                                        <th class="w-2/12 border px-2 py-1">Contact No.</th>
                                        <th class="w-3/12 border px-2 py-1">Email</th>
                                        <th class="w-2/12 border px-2 py-1">Address</th>
                                        <th class="w-2/12 border px-2 py-1">Employer</th>
                                        <th class="w-2/12 border px-2 py-1">Employer Address</th>
                                        <th class="w-2/12 border px-2 py-1">Position</th>
                                        <th class="w-2/12 border px-2 py-1 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-xs">
                                    @foreach($alumniData as $index => $alumni)
                                        <tr class="bg-white border-b">
                                            <td class="border px-2 py-1 text-center">{{ $alumniData->firstItem() + $index }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->last_name }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->first_name }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->cellphone_number }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->email }}</td>
                                            <td class="border px-2 py-1">{{ $alumni->home_address }}</td>
                                            <td class="border px-2 py-1">{{ optional($alumni->professionalData)->employer }}</td>
                                            <td class="border px-2 py-1">{{ optional($alumni->professionalData)->employer_address }}</td>
                                            <td class="border px-2 py-1">{{ optional($alumni->professionalData)->present_position }}</td>
                                            <td class="border px-2 py-1 text-center">
                                                <div class="flex justify-center space-x-2">
                                                    <!-- Edit button remains the same -->
                                                    <a href="{{ route('alumni.edit', $alumni->id) }}" class="hover:bg-blue-700 text-xs font-semibold text-white bg-blue-600 py-1 px-2 rounded-md">Edit</a>

                                                    <!-- Delete form with method DELETE -->
                                                    <form action="{{ route('alumni.delete', $alumni->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-xs font-semibold text-white py-1 px-2 rounded-md">Delete</button>
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
            const tableHTML = document.getElementById('alumniTable').outerHTML;
            printWindow.document.write('<html><head><title>Print Table</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
            printWindow.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
            printWindow.document.write('thead { background-color: #f2f2f2; }');
            printWindow.document.write('tbody tr:nth-child(even) { background-color: #f9f9f9; }');
            printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h1>Alumni Directory</h1>');
            printWindow.document.write(tableHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
        }
    </script>
</x-app-layout>
