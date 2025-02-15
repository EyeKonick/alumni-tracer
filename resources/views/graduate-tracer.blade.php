<x-app-layout>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Graduate Tracer Data</h1>


                    <!-- Buttons -->
                    <div class="flex justify-end mb-6 space-x-2">

                        {{-- Search Button --}}
                        <div class="flex justify-center items-center">
                            <form method="GET" action="{{ route('graduate.tracer.data') }}" class="flex space-x-2">
                                <input type="number" name="year" value="{{ old('year', $year) }}" placeholder="Year"
                                    min="1900" max="{{ date('Y') }}" step="1"
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-md w-36" />

                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H16M8 12H16M8 8H16" />
                                    </svg>
                                    <span class="ml-2">Filter</span>
                                </button>
                            </form>
                        </div>

                        <!-- Print Button -->
                        <button onclick="printGraduateTracer()"
                            class="inline-flex items-center px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 10h12m-6-6v6M6 18h12m-6-6v6m4 4H8m4-4v4M4 8h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V10a2 2 0 012-2z" />
                            </svg>
                            <span class="ml-2 text-sm">Print</span>
                        </button>

                        <!-- Export Button -->
                        <a href="{{ route('graduate.tracer.export', ['year' => $year]) }}"
                            class="inline-flex items-center px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-md shadow-sm">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM6 2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zM10 14l2 2 2-2m-2-6v6"/>
                             </svg>
                             <span class="ml-2 text-sm">Export</span>
                         </a>
                    </div>


                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Program</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No. of Graduates</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No. of Graduates Employed</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Percentage of Employed Graduates</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">{{ $row['course'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $row['graduates'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $row['employed'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $row['percentage_employed'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Script -->
    <script>
        function printGraduateTracer() {
            const yearInput = document.querySelector('input[name="year"]');
            const year = yearInput ? yearInput.value : null;

            const title = year ?
                `${year} Graduate Tracer Data` :
                'Graduate Tracer Data';

            const printWindow = window.open('', '', 'height=600,width=800');
            const tableContent = document.querySelector('table').outerHTML;

            printWindow.document.write(`
                <html>
                <head>
                    <title>${title}</title>
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
                                margin: 0 auto;
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
                            td:first-child {
                                text-align: left;
                            }​
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
                    <div class="header">
                        <img src="images/capsu_logo.jpg" alt="Logo">
                        <h1>Republic of the Philippines</h1>
                        <h2 class="university">CAPIZ STATE UNIVERSITY</h2>
                        <h1>Fuentes Drive, Roxas City, Capiz, Philippines</h1>
                        <p>Tel. No. (036) 651-5347 (036) 651-5348 Fax No. (036) 620-0682</p>
                        <p>Website: www.capsu.edu.ph | Email: mambusao@capsu.edu.ph</p>
                    </div>
                    <h3 style="text-align:center">MAMBUSAO SATELLITE COLLEGE</h3>
                    <h3 style="text-align:center;">${title}</h3>
                    ${tableContent}
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
