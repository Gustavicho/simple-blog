@props(['name', 'label', 'required' => false])

<div {{ $attributes->merge(['class' => 'mb-6']) }}>
    <x-forms.label for="{{ $name }}" :value="__($label)" />

    <textarea id="{{ $name }}" name="{{ $name }}" rows="4"
        class="block mt-1 w-full rounded-md bg-transparent border-black shadow-sm focus:border-blue-500 focus:ring-blue-500"
        {{ $required ? 'required' : '' }}>
        {{ old($name) }}
        </textarea>

    <x-forms.input-error :messages="$errors->get($name)" class="mt-2" />
</div>
