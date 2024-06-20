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
    <link rel="shortcut icon" href="{{ 'images/logo/logo.png' }}">

    <wireui:scripts />
    {{-- @filamentStyles --}}
    @vite(['resources/css/app.css'])

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <wireui:scripts />

</head>

<body class="antialiased tracking-tight">
    <x-dialog />
    <x-notifications />
    @yield('body')
    {{-- @filamentScripts --}}
</body>

</html>
