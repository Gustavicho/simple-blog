@props(['size' => 'md', 'tag', 'for' => 'tags'])

@php
    $classes = 'inline-flex items-center rounded-full bg-gray/30 transition duration-150 ease-in-out
        hover:bg-gray/50 focus:outline-none focus:ring-2 focus:ring-clrPrimary focus:ring-offset-2';
    match ($size) {
        'sm' => ($classes .= ' text-xs px-2.5 py-0.5'),
        'md' => ($classes .= ' text-sm px-3 py-1.5'),
        'lg' => ($classes .= ' text-base px-4 py-2'),
        default => ($classes .= ' text-xs px-2.5 py-0.5'),
    };

    $link = '/' . $for . '/' . strtolower($tag->name);
@endphp

<a {{ $attributes->merge(['class' => $classes, 'href' => $link]) }}>
    {{ $tag->name }}
</a>
