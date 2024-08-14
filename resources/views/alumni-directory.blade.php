<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumni Directory') }}
        </h2>
    </x-slot>

    <section class="relative flex flex-col px-4 w-full my-8 items-center">
        <div class="w-full max-w-7xl bg-white border border-black p-6 mt-4">
            <!-- Export to Excel Form -->
            <form method="GET" >
                {{-- action="{{ route('admin.export-excel') }}" --}}
                @csrf
                <button type="submit" class="px-12 py-2 bg-green-500 font-bold text-white rounded-md shadow hover:bg-green-600">Export to Excel</button>
            </form>
            <div class="overflow-x-auto mt-4">
                <!-- Filter Form -->
                <form method="GET" action="{{ route('admin.alumni-directory') }}" class="mb-4">
                    <div class="text-right mb-2">
                        <button type="submit" class="px-12 py-2 bg-blue-500 font-bold text-white rounded-md shadow hover:bg-blue-600">Filter</button>
                    </div>
                    <div class="bg-green-300 py-2">
                        <div class="grid grid-cols-6 gap-x-1">
                            <div>
                                <input type="text" name="filter[last_name]" placeholder="Filter by Last Name" value="{{ request('filter.last_name') }}" class="w-full px-2 py-1 border-2 border-black rounded-md text-black">
                            </div>
                            <div>
                                <input type="text" name="filter[first_name]" placeholder="Filter by First Name" value="{{ request('filter.first_name') }}" class="w-full px-2 py-1 border-2 border-black rounded-md text-black">
                            </div>
                            <div>
                                <input type="text" name="filter[middle_name]" placeholder="Filter by Middle Name" value="{{ request('filter.middle_name') }}" class="w-full px-2 py-1 border-2 border-black rounded-md text-black">
                            </div>
                            <div>
                                <select name="filter[grad_course]" class="w-full px-2 py-1 border-2 border-black rounded-md text-black">
                                    <option value="">Filter by Grad Course</option>
                                    @foreach($courses as $id => $course)
                                        <option value="{{ $course }}" {{ request('filter.grad_course') == $course ? 'selected' : '' }}>{{ $course }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative">
                                <select id="year-dropdown" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-2 border-black rounded-md" onchange="updateYearInput(this)">
                                    <option value="">Select Year</option>
                                    @for($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}" {{ request('filter.grad_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                                <input id="year-input" type="text" name="filter[grad_year]" placeholder="Or enter a custom year" value="{{ request('filter.grad_year') }}" class="w-full px-2 py-1 border-2 border-black rounded-md text-black">
                            </div>
                            <div>
                                <input type="text" name="filter[major]" placeholder="Filter by Major" value="{{ request('filter.major') }}" class="w-full px-2 py-1 border-2 border-black rounded-md text-black">
                            </div>
                        </div>
                    </div>
                </form>

                @if($alumni->isEmpty())
                    <div class="py-4 text-center text-red-500">
                        No results found for the given filters.
                    </div>
                @else
                    <!-- Alumni Table -->
              <!-- Alumni Table -->
                <table class="w-full bg-white border border-black text-black">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border border-black">LAST NAME</th>
                            <th class="py-2 px-4 border border-black">FIRST NAME</th>
                            <th class="py-2 px-4 border border-black">MIDDLE NAME</th>
                            <th class="py-2 px-4 border border-black">GRAD COURSE</th>
                            <th class="py-2 px-4 border border-black">GRAD YEAR</th>
                            <th class="py-2 px-4 border border-black">MAJOR</th>
                            <th class="py-2 px-4 border border-black">ACTION</th> <!-- Action Column -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni as $alumnus)
                        <tr>
                            <td class="py-2 px-4 border border-black">{{ $alumnus->last_name }}</td>
                            <td class="py-2 px-4 border border-black">{{ $alumnus->first_name }}</td>
                            <td class="py-2 px-4 border border-black">{{ $alumnus->middle_name }}</td>
                            <td class="py-2 px-4 border border-black">{{ $alumnus->grad_course }}</td>
                            <td class="py-2 px-4 border border-black">{{ $alumnus->grad_year }}</td>
                            <td class="py-2 px-4 border border-black">{{ $alumnus->major }}</td>
                            <td class="py-2 px-4 border border-black">
                                <a href="{{ route('admin.alumni.show', ['id' => $alumnus->id]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $alumni->links('pagination::tailwind') }}
                    </div>
                @endif
            </div>

            <!-- Back Button -->
            <div class="mt-4">
                <button onclick="window.history.back()" class="px-4 py-2 bg-gray-600 text-white rounded-md shadow hover:bg-gray-500">
                    Back
                </button>
            </div>
        </div>
    </section>

    <script>
        function updateYearInput(select) {
            const input = document.getElementById('year-input');
            input.value = select.value;
        }

        document.getElementById('year-input').addEventListener('input', function() {
            document.getElementById('year-dropdown').value = '';
        });
    </script>
</x-app-layout>
