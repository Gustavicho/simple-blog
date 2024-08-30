<x-app-layout>
    <x-gradient-title class="text-center mb-8">Edit: {{ $article->title }}</x-gradient-title>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray/20 rounded-lg">
        <form method="post" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="space-y-8 py-6 px-4">
                <x-forms.input name="title" label="Title" />

                <x-forms.textarea name="content" label="Content" />

                @include('articles.partials.add-optionals')

                <div>
                    <x-nav-link href="{{ route('articles.show', $article) }}">Back</x-nav-link>
                    <x-forms.button>Save</x-forms.button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
