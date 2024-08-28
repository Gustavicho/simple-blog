<x-app-layout>
    <div class="space-y-12">
        <section>
            <x-section-title>Categories</x-section-title>
            @foreach ($categories as $category)
                <x-tag :tag="$category" for="categories" />
            @endforeach
        </section>

        <section>
            <x-section-title>Tags</x-section-title>
            @foreach ($tags as $tag)
                <x-tag :$tag />
            @endforeach
        </section>

        <section>
            <x-section-title>Articles</x-section-title>
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </section>
    </div>
</x-app-layout>
