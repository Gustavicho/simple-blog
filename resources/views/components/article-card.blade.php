<x-panel class="justify-between gap-4">
    <div class="flex-1 flex flex-col">
        <p class="text-sm opacity-50">
            {{ $article->user->name }}
        </p>

        <a href="{{ route('articles.show', $article) }}"
            class="text-xl font-bold mt-2 mb-4 group-hover:text-clrPrimary transition duration-300">
            {{ $article->title }}
        </a>
        <p class="text-sm opacity-50 mt-auto">
            {{ $article->created_at->diffForHumans() }}
        </p>
    </div>

    <div class="flex flex-col justify-between items-end gap-2">
        @if ($article->category !== null)
            <x-tag :tag="$article->category" for="categories" />
        @endif

        @if ($article->tags->count() > 0)
            <div>
                @foreach ($article->tags as $tag)
                    <x-tag :$tag size="sm" />
                @endforeach
            </div>
        @endif
    </div>
</x-panel>
