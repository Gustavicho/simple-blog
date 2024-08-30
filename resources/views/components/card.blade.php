@props([
    'imgSrc' => 'https://i.kym-cdn.com/entries/icons/original/000/026/638/cat.jpg',
    'btnLink' => 'https://github.com/Gustavicho',
    'btnText' => 'See my GitHub',
    'title' => 'The Polite Cat',
])

<div class="flex flex-col bg-gray/20 rounded-xl max-w-md overflow-hidden">
    <img src="{{ $imgSrc }}" />
    <div class="px-16 py-12">
        <h3 class="font-bold text-2xl">{{ $title }}</h3>
        <p class="mt-4 mb-8">
            {{ $slot }}
        </p>

        <a href="{{ $btnLink }}"
            class="px-4 py-2 text-sm text-clrPrimary border-2 border-clrPrimary rounded-full
        hover:bg-clrPrimary hover:text-white hover:border-transparent focus:bg-clrSecondary transition duration-200">
            {{ $btnText }}
        </a>
    </div>
</div>
