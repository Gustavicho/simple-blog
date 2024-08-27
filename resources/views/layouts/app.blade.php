<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-hanken-grotesk pb-12">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 mb-12 border-b border-white/15">
            <div>
                <a href="/">
                    LOGO
                    {{-- <img src="{{ Vite::asset('resources/images/logo.svg') }}"> --}}
                </a>
            </div>
            <div class="space-x-4 font-bold">
                <x-nav-link href="/" :active="request()->is('/')">Aticles</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('/about')">About us</x-nav-link>
                @auth
                    <x-nav-link href="/articles" :active="request()->is('/articles')">My articles</x-nav-link>
                @endauth
            </div>
            <div class="flex gap-4 font-bold">
                @guest
                    <x-nav-link href="/login" :active="request()->is('/login')">Login us</x-nav-link>
                @endguest
                @auth
                    <a href="/articles/create">Post article</a>
                    <a href="/profile">Profile</a></a>
                @endauth
            </div>
        </nav>

        <main class="max-w-[960px] mx-auto pb-12">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
