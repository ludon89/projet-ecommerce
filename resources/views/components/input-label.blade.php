@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-yellow']) }}>
    {{ $value ?? $slot }}
</label>
