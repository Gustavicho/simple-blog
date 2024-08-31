<x-app-layout>
    <div class="space-y-12">
        <section class="text-center space-y-6">
            <x-gradient-title>Find the perfect article!</x-gradient-title>

            <form method="get" action="/search">
                <x-forms.input name="q" class="max-w-[70ch]" :label="null" placeholder="How cook potatos..." />
            </form>
        </section>

        <div class="grid grid-cols-2  gap-8">
            <section>
                <x-section-title>Categories</x-section-title>
                <div class="space-x-1 space-y-1 overflow-auto max-h-[13ch]">
                    @foreach ($categories as $category)
                        <x-tag :tag="$category" for="categories" />
                    @endforeach
                </div>
            </section>

            <section>
                <x-section-title>Tags</x-section-title>
                <div class="space-x-1 space-y-1 overflow-auto max-h-[13ch]">
                    @foreach ($tags as $tag)
                        <x-tag :$tag />
                    @endforeach
                </div>
            </section>
        </div>

        <section>
            <x-section-title>Articles</x-section-title>
            <div class="space-y-6">
                @foreach ($articles as $article)
                    <x-article-card :article="$article" />
                @endforeach
            </div>
        </section>

        {{ $articles->links() }}
    </div>
</x-app-layout>
