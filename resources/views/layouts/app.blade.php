<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Top Fixed Navigation -->
    <div class="bg-gray-100 min-h-screen">
        @include('layouts.navigation')

        <!-- Page Container (Sidebar + Content) -->
        <div class="flex">
            <!-- Sidebar -->
            <aside class="w-1/5 bg-white shadow-md py-8 px-4 min-h-screen">
                <ul class="space-y-4">
                    <!-- Alumni Directory -->
                    <li>
                        <a href="{{ route('alumni.directory') }}"
                            class="flex items-center p-4 rounded-lg shadow hover:bg-red-400 hover:text-white transition duration-300
                            {{ request()->routeIs('alumni.directory') ? 'bg-red-400 text-white' : 'bg-gray-100 text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ request()->routeIs('alumni.directory') ? 'text-white' : 'text-red-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18M3 19h18" />
                            </svg>
                            <span class="ml-3 font-medium">{{ __('Alumni Directory') }}</span>
                        </a>
                    </li>

                    <!-- Graduate Tracer Data -->
                    <li>
                        <a href="{{ route('graduate.tracer.data') }}"
                            class="flex items-center p-4 rounded-lg shadow hover:bg-red-400 hover:text-white transition duration-300
                            {{ request()->routeIs('graduate.tracer.data') ? 'bg-red-400 text-white' : 'bg-gray-100 text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ request()->routeIs('graduate.tracer.data') ? 'text-white' : 'text-red-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8V4M12 12v-2m0 10V16m4 4h-4m0-4h4m-4-4h4" />
                            </svg>
                            <span class="ml-3 font-medium">{{ __('Graduate Tracer Data') }}</span>
                        </a>
                    </li>


                    <!-- Employability Tracer Data -->
                    <li>
                        <a href="{{ route('alumni.employability') }}"
                            class="flex items-center p-4 rounded-lg shadow hover:bg-red-400 hover:text-white transition duration-300
                            {{ request()->routeIs('alumni.employability') ? 'bg-red-400 text-white' : 'bg-gray-100 text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ request()->routeIs('alumni.employability') ? 'text-white' : 'text-red-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="ml-3 font-medium">{{ __('Employability Tracer Data') }}</span>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <div class="w-4/5 bg-gray-100">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="px-2">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>
</html>
