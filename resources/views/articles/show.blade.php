<x-app-layout>
    <div class="space-y-12 text-center">
        <div>
            <h1 class="text-3xl font-bold mb-2">{{ $article->title }}</h1>
            <p class="opacity-50">By: {{ $article->user->name }}</p>
        </div>

        @if ($article->image)
            <img src="{{ $article->image }}" alt="{{ $article->title }}" class="mx-auto">
        @endif


        <p class="text-pretty bg-white/10 rounded-md px-4 py-6 max-w-[80ch] mx-auto">
            {{ $article->content }}
        </p>

        <div class="flex justify-center gap-2 flex-wrap">
            @if ($article->hasCategory())
                <x-tag :tag="$article->category" for="categories" />
            @endif

            @if ($article->hasTags())
                @foreach ($article->tags as $tag)
                    <x-tag :$tag />
                @endforeach
            @endif
        </div>

        @can('update', $article)
            <div class="flex justify-start gap-4">
                <x-nav-link href="{{ route('articles.edit', $article) }}">Edit</x-nav-link>
                <form action="{{ route('articles.destroy', $article) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-forms.danger-button>Delete</x-forms.danger-button>
                </form>
            </div>
        @endcan

    </div>
</x-app-layout>
