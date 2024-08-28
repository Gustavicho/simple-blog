<section>
    <x-forms.label for="categories" :value="__('Categories')" />
    <x-forms.input name="categories" placeholder="Unique value" class="mt-1 block w-full" />
    <x-forms.input-error :messages="$errors->get('categories')" class="mt-2" />
</section>
