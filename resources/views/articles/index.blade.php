<x-app-layout>
    <div class="space-y-12">
        <x-gradient-title class="text-center">Find the perfect article!</x-gradient-title>

        <div class="grid grid-cols-2  gap-8">
            <section>
                <x-section-title>Categories</x-section-title>
                <div class="space-x-1">
                    @foreach ($categories as $category)
                        <x-tag :tag="$category" for="categories" />
                    @endforeach
                </div>
            </section>

            <section>
                <x-section-title>Tags</x-section-title>
                <div class="space-x-1">
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
    </div>
</x-app-layout>
