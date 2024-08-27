@php
    $classes = 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-blue-600
        focus:outline-none focus:bg-blue-200 transition duration-150 ease-in-out';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
