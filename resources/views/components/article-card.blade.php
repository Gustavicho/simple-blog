@php
    $link = '/articles/' . $article->user->name . '/' . str_replace(' ', '-', $article->title);
@endphp

<x-panel class="justify-between gap-4">
    <div class="flex-1 flex flex-col">
        <p class="text-sm opacity-50">
            {{ $article->user->name }}
        </p>

        <a href="{{ $link }}"
            class="text-xl font-bold mt-2 mb-4 group-hover:text-blue-600 transition duration-300">
            {{ $article->title }}
        </a>
        <p class="text-sm opacity-50 mt-auto">
            {{ $article->created_at->diffForHumans() }}
        </p>
    </div>

    <div class="flex flex-col justify-between items-end gap-2">
        <x-tag :tag="$article->category" for="categories" />

        <div>
            @foreach ($article->tags as $tag)
                <x-tag :$tag size="sm" />
            @endforeach
        </div>
    </div>
</x-panel>
