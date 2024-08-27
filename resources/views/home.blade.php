<x-app-layout>
    <div class="space-y-12">
        <section>
            <x-section-title>Categories</x-section-title>
            @for ($i = 0; $i < 5; $i++)
                <x-tag href="#" size="md">Científico</x-tag>
            @endfor
        </section>

        <section>
            <x-section-title>Tags</x-section-title>
        </section>

        <section>
            <x-section-title>Articles</x-section-title>
        </section>
    </div>
</x-app-layout>
