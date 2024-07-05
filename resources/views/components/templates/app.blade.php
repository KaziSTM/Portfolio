@extends('components.templates.base')

@section('body')
    <div class="flex flex-col w-full min-h-screen overflow-hidden bg-slate-50 text-secondary-900">
        <x-organisms.header />
        <main class="grow">
            @yield('content')

            @if ($slot->isNotEmpty())
                {{ $slot }}
            @endif
        </main>
    </div>
    <x-organisms.footer />
@endsection
