@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-blue-600 text-sm font-medium leading-5 text-white focus:outline-none  focus:border-blue-400 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 mr-2 border-b-2 text-sm font-medium border-transparent leading-5 hover:border-blue-600 focus:outline-none focus:text-blue-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
