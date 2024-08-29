<x-app-layout>
    <div class="space-y-12 text-center">
        <div>
            <h1 class="text-3xl font-bold mb-2">{{ $article->title }}</h1>
            <p class="opacity-50">By: {{ $article->user->name }}</p>
        </div>

        <p class="text-pretty bg-white/10 rounded-md px-4 py-6 max-w-[80ch] mx-auto">
            {{ $article->text }}
        </p>

        <div class="flex justify-center gap-2 flex-wrap">
            @if ($article->category !== null)
                <x-tag :tag="$article->category" for="categories" />
            @endif

            @if ($article->tags->count() > 0)
                @foreach ($article->tags as $tag)
                    <x-tag :$tag />
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
