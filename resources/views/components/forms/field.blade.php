@props(['name', 'label' => $name, 'type' => 'text'])

@if ($label !== null)
    <x-forms.label for="{{ $name }}" :value="__($label)" />
@endif

<x-forms.input :id="$name" :name="$name" :type="$type" class="mt-1 block w-full" :value="old($name)" required
    autofocus autocomplete="{{ $name }}" />
<x-forms.input-error class="mt-2" :messages="$errors->get($name)" />
