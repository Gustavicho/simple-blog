<section>
    <x-forms.label for="category" :value="__('Category')" />
    <x-forms.input name="category" placeholder="Unique value" class="mt-1 block w-full" />
    <x-forms.input-error :messages="$errors->get('category')" class="mt-2" />
</section>
