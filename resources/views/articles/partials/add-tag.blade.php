<section>
    <x-forms.label for="tags" :value="__('Tags')" />
    <x-forms.input name="tags" placeholder="comma separated tags(laravel, php)" class="mt-1 block w-full" />
    <x-forms.input-error :messages="$errors->get('categories')" class="mt-2" />
</section>
