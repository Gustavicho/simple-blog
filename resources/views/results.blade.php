<x-app-layout>
    <x-gradient-title class="text-center my-8">Results</x-gradient-title>
    <section class="space-y-6">
        @foreach ($articles as $article)
            <x-article-card :$article />
        @endforeach

        {{ $articles->links() }}
    </section>
</x-app-layout>
