<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}"
    class="soft-scrollbar"
>

<head>

    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.ico') }}">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>


    @vite('resources/js/app.js')

    <x-inertia::head/>

</head>

<body class="antialiased tracking-tight">
<x-inertia::app/>
</body>

</html>
