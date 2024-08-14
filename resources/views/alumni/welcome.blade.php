<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumni Tracer</title>
    <!-- Fonts -->
    @vite('resources/css/app.css')
</head>
<body class="h-screen m-0 overflow-hidden bg-alumni-bg bg-cover bg-center bg-fixed text-white flex flex-col items-center justify-center text-center font-figtree relative">
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-overlay pointer-events-none z-10"></div>
    <!-- Title Heading -->
    <h1 class="absolute top-5 text-lg md:text-3xl lg:text-5xl z-20 font-dangwa text-white">
        CAPIZ STATE UNIVERSITY MAMBUSAO SATELLITE COLLEGE
    </h1>

    <!-- Page Content -->
    <main class="relative container mx-auto flex flex-col md:flex-row items-center justify-center h-full z-20">


        <!-- Logo Section -->
        <section id="logo" class="w-full md:w-7/12 flex items-center justify-center p-4">
            <img src="{{ asset('images/alumni-logo.png') }}" alt="Alumni Logo" class="w-full h-auto max-w-full max-h-full p-5">
        </section>

        <!-- Login and Register Section -->
        <section id="login-register" class="w-full md:w-5/12 flex flex-col items-center justify-center gap-4 py-12 p-0 relative">
            <h3 class="text-6xl font-bold text-white mb-8">
                Welcome Alumni
            </h3>
            @if (Route::has('login'))
                <div class="flex flex-col items-center justify-center gap-4 w-full">
                    @auth
                    <a
                        href="{{ url('alumni.dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a>
                    @else
                        <a href="{{ route('alumni.login') }}" class="rounded-full bg-green-500 hover:bg-green-600 text-white text-lg md:text-2xl font-bold py-4 md:py-6 px-8 md:px-12 shadow-lg hover:shadow-xl transition duration-500 w-full md:w-80 text-center border-4 hover:border-green-950 uppercase">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('alumni.register') }}" class="rounded-full bg-yellow-500 hover:bg-yellow-600 text-white text-lg md:text-2xl font-bold py-4 md:py-6 px-8 md:px-12 shadow-lg hover:shadow-xl transition duration-500 w-full md:w-80 text-center border-4 hover:border-orange-900 uppercase">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- Admin login link -->
            <a href="{{ url('login') }}" class="uppercase underline text-black text-lg font-bold">Login as Admin</a>
        </section>

    </main>
</body>
</html>
