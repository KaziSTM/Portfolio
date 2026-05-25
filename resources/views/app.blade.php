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

    @routes

    @vite('resources/js/app.js')

    @inertiaHead
</head>

<body class="antialiased tracking-tight">
@inertia
</body>
</html>
