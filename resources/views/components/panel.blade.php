@php
    $defaults =
        'bg-gray/20 p-4 rounded-xl flex border border-transparent hover:border-clrPrimary transition duration-300 group';
@endphp

<div {{ $attributes(['class' => $defaults]) }}>
    {{ $slot }}
</div>
