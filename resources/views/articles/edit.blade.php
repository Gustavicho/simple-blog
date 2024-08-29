<x-app-layout>
    <x-section-title>Edit Article</x-section-title>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white/10 rounded-lg">
        <form method="post" action="{{ route('articles.update', $article) }}" class="py-8 px-4 space-y-10">
            @csrf
            @method('PATCH')

            <div>
                <x-forms.field name="title" label="Title" />
            </div>

            <x-forms.textarea name="text" label="Content" />

            @include('articles.partials.add-category')
            @include('articles.partials.add-tag')

            <x-forms.primary-button>Save</x-forms.primary-button>
        </form>
    </div>
</x-app-layout>
