<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}"
    class="scrollbar-default"
>
<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="description"
        content="Youcef Nezrek is a Full-Stack Software Engineer specializing in Laravel, Vue.js, Inertia.js, Filament, and scalable web applications."
    >

    <meta
        name="author"
        content="Youcef Nezrek"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:title"
        content="Youcef Nezrek — Full-Stack Software Engineer"
    >

    <meta
        property="og:description"
        content="Building modern web applications with Laravel, Vue.js, Inertia.js, and Filament."
    >

    <meta
        property="og:image"
        content="{{ asset('assets/images/og-image.jpg') }}"
    >

    <meta
        property="og:url"
        content="{{ url()->current() }}"
    >

    <meta
        name="twitter:card"
        content="summary_large_image"
    >

    <meta
        name="twitter:title"
        content="Youcef Nezrek — Full-Stack Software Engineer"
    >

    <meta
        name="twitter:description"
        content="Building modern web applications with Laravel, Vue.js, Inertia.js, and Filament."
    >

    <meta
        name="twitter:image"
        content="{{ asset('assets/images/og-image.jpg') }}"
    >

    <link
        rel="canonical"
        href="{{ url()->current() }}"
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
