<x-guest-layout>
    <h2 class="text-center font-bold">Register as Alumni</h2>

    <form method="POST" action="{{ route('alumni.register') }}" id="registration-form">
        @csrf

        @include('alumni-partials.alumni-register')
        @include('alumni-partials.personal-register')
        @include('alumni-partials.professional-register')
        @include('alumni-partials.survey-register')
        @include('alumni-partials.confirmation-register')

    </form>

        @include('alumni-partials.register-script')

</x-guest-layout>
