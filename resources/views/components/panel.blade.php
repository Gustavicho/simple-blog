@php
    $defaults =
        'bg-white/5 p-4 rounded-xl flex border border-transparent hover:border-blue-600 transition duration-300 group';
@endphp

<div {{ $attributes(['class' => $defaults]) }}>
    {{ $slot }}
</div>
