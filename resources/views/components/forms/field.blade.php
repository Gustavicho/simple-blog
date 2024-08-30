@props(['name', 'label'])
<div>
    @if ($label !== null)
        <x-forms.label for="{{ $name }}" :value="__($label)" />
    @endif

    <div>
        {{ $slot }}

        <x-forms.error :messages="$errors->get($name)" />
    </div>
</div>
