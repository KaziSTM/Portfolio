<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}"
    class="soft-scrollbar"
>
<head>
    <meta charset="utf-8" />

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>{{ config('app.name') }}</title>

    <link
        rel="shortcut icon"
        href="{{ asset('assets/images/logo/favicon.ico') }}"
    >

    @if (request()->routeIs('home'))
        <link
            rel="preload"
            as="image"
            href="{{ asset('assets/images/portrait-2.webp') }}"
            imagesizes="(min-width: 1024px) 512px, (min-width: 768px) 480px, calc(100vw - 2rem)"
        >
        <link
            rel="preload"
            as="image"
            href="{{ asset('assets/svg/home-hero-gradient.svg') }}"
        >
    @endif

    @routes

    @vite('resources/js/app.js')

    @inertiaHead
</head>

<body class="antialiased tracking-tight">
@inertia
</body>
</html>
