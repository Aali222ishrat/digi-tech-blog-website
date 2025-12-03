@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-lg font-semibold text-black-800 mb-1']) }}>
    {{ $value ?? $slot }}
</label>
