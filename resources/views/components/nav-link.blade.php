@props(['active'])

{{-- @php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp --}}

@php
$classes = ($active ?? false)
            ? 'mt-3 text-white text-2xl font-semibold font-display hover:underline decoration-yellow decoration-wavy underline-offset-8 sm:mx-3 sm:mt-0'
            : 'mt-3 text-white text-2xl font-semibold font-display hover:underline decoration-yellow decoration-wavy underline-offset-8 sm:mx-3 sm:mt-0';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
