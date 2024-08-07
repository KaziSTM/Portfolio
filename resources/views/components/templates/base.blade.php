<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="soft-scrollbar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
        <title>
            @yield('title') - {{ config('app.name') }}
        </title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <meta name="description" content="Laravel Jetstream">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.ico') }}">
    <tallstackui:script />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="antialiased tracking-tight">

    @yield('body')
</body>

</html>
