<li class=" list-none">
    <a href="{{ $route ? route($route) : '' }}" wire:navigate
        class="relative flex space-x-4 items-center w-full px-4 py-2 text-md
        {{ request()->routeIs($route) ? 'active font-medium text-slate-900' : 'font-light text-secondary-500' }}
        underline-half">
        {{ $slot }}
        <span class="capitalize">{{ trans($label) }}</span>
    </a>
</li>
