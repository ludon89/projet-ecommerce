@props(['active'])

@php
$classes = ($active ?? false)
            ? 'mt-3 text-white text-2xl font-semibold font-display hover:underline decoration-yellow decoration-wavy underline-offset-8 sm:mx-3 sm:mt-0'
            : 'mt-3 text-white text-2xl font-semibold font-display hover:underline decoration-yellow decoration-wavy underline-offset-8 sm:mx-3 sm:mt-0';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
