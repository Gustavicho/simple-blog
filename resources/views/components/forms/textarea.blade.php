@props(['name', 'label'])

@php
    $defaults = [
        'name' => $name,
        'id' => $name,
        'class' => 'block mt-1 w-full rounded-md bg-transparent border-black shadow-sm focus:border-blue-500 focus:ring-blue-500',
        'rows' => '4',
    ]
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}></textarea>
</x-forms.field>
