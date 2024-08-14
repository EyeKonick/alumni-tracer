@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'border-green-300  border-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm normal-case'
    ]) !!}
>
