<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Alumni Tracer') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen m-0 overflow-hidden text-white flex flex-col items-center justify-center text-center font-figtree relative">
    <!-- Background Container -->
    <div class="relative w-full h-full bg-alumni-bg bg-cover bg-center bg-fixed">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-overlay pointer-events-none z-10"></div>

        <!-- Page Content -->
        <div class="relative z-20 flex flex-col items-center justify-center h-full">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow w-full z-30">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Main Content -->
            <main class="relative w-full flex flex-col md:flex-row justify-center h-full">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
