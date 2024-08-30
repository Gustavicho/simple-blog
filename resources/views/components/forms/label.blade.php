@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-200']) }}>
    {{ $value ?? $slot }}
</label>
