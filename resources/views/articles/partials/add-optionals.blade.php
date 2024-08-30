<x-forms.input name="image" label="Image" type="file" />

<x-forms.input name="category" label="Category" list="categories" />

<datalist id="categories">
    @foreach ($categories as $category)
        <option value="{{ $category->name }}"></option>
    @endforeach
</datalist>

<x-forms.input name="tags" label="Tags" placeholder="comma separated (e.g. tag1, tag2, tag3)" />
