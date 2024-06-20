<div >
    <div class="hidden md:flex ">
        <div class="w-full flex items-center justify-center space-x-6">
            @foreach ($navigation as $link)
                <x-atoms.link :label="$link['label']" :route="$link['route']" />
            @endforeach
        </div>
    </div>
    <div class="relative flex md:hidden">
        <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
            class="relative flex xl:hidden z-50 w-auto h-auto">
            <div class="absolute z-[99] -top-6 right-1 ">
                <button @click="modalOpen=!modalOpen;console.log(modalOpen)"
                    class="flex flex-col rotate-45 w-full px-5 py-4 font-semibold text-left select-none focus:border-none focus-ring-none">
                    <div :class="modalOpen ? 'opacity-100 scale-150' : 'rotate-45'"
                        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="relative flex items-center justify-center transition-all w-4 h-4 duration-300 ease-out">
                        <div class="absolute w-0.5 h-3/5 bg-neutral-900 group-hover:bg-neutral-800 rounded-full"></div>
                        <div :class="{ 'rotate-90': !modalOpen }"
                            class="absolute w-7/12 h-0.5 ease duration-900 bg-neutral-900 group-hover:bg-neutral-800 rounded-full">
                        </div>
                    </div>
                    <div x-cloak x-show="!modalOpen" :class="{ 'rotate-45': !modalOpen }"
                        class="relative flex  w-4 h-4 duration-300 ease-out">
                        <div
                            class="absolute w-0.5 h-3/5 bottom-[14.5px] bg-neutral-900 group-hover:bg-neutral-800 rounded-full">
                        </div>
                        <div :class="{ 'rotate-90': !modalOpen }"
                            class="absolute w-7/12 h-0.5 left-[1.5px] -top-[4.5px] ease duration-900 bg-neutral-900 group-hover:bg-neutral-800 rounded-full">
                        </div>
                    </div>
                </button>
            </div>
            <template x-teleport="body">
                <div x-show="modalOpen"
                    class="absolute top-0 left-0 z-[30] flex items-start justify-center w-screen h-screen" x-cloak>
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @click="modalOpen=false"
                        class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                    <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="relative w-10/12 py-6 translate-y-20 bg-white px-7 rounded-xl shadow-md shadow-primary-50">
                        <div class="relative w-auto">
                            <div class="flex flex-col pb-2">
                                @foreach ($navigation as $link)
                                    <a href="{{ $link['route'] }}"
                                        class="relative flex cursor-default select-none hover:bg-primary-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                        <span>{{ $link['label'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
