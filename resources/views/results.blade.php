<x-app-layout>
    <x-section-title>Results</x-section-title>
    <section>
        @foreach ($articles as $article)
            <x-article-card :$article />
        @endforeach
    </section>
</x-app-layout>
