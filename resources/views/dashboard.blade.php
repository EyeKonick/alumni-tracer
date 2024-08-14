<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CAPIZ STATE UNIVERSITY MAMBUSAO SATELLITE COLLEGE') }}
        </h2>
    </x-slot>

    <main class="container flex items-center justify-center w-full h-full">
        <div class="text-center gap-4">
            <a href="#" class="block mb-4 text-2xl text-white bg-black bg-opacity-60 py-8 px-12 rounded-full font-bold">MANAGE ACCOUNT</a>
            <a href="{{ route('admin.alumni-records') }}" class="block mb-4 text-2xl text-white bg-black bg-opacity-60 py-8 px-12 rounded-full font-bold">ALUMNI RECORDS</a>
        </div>
    </main>

</x-app-layout>
