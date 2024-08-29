<h1 {{ $attributes->merge(['class' => 'text-4xl font-bold']) }}>
    <span
        class="bg-gradient-to-l from-clrPrimary to-clrSecondary bg-clip-text text-transparent">{{ $slot }}</span>
</h1>
