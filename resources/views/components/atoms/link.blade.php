<li>
    <a href="{{ route($route) }}" wire:navigate
       class="flex space-x-4 items-center w-full px-4 py-2 text-sm   {{ request()->routeIs($request) ? 'font-medium text-secondary-500 ' : 'font-light text-slate-900' }}">
        {{ $slot }}
        <span class="text-slate-900 capitalize">{{ trans($label) }}</span>
    </a>
</li>
