<header class="relative py-4 md:py-6 border-b border-secondary-200 z-[99]">
    <div class="flex items-center justify-between w-full mx-auto max-w-8xl px-6 md:px-32">
        <div class="shrink-0">
            <x-atoms.logo class="w-12 h-10"/>
        </div>
        <x-organisms.menu/>
        <div class="hidden md:flex">
            <button wire:navigate href="{{route('contact')}}"
                    class="bg-slate-100 py-2 px-6 border border-secondary-200 rounded-2xl focus:outline-hidden">
                <span class="font-semibold text-secondary-900 "> Book a call</span>
            </button>
        </div>
    </div>
</header>
