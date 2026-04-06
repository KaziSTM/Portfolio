<div>
    <section class="py-10 bg-slate-900 sm:pt-16 lg:pt-24">
        <div class="px-4 mx-auto sm:px-12 lg:px-8 max-w-7xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-32">
                <div class="space-y-16 ">
                    <x-atoms.subtitle class="text-white">Lets make something great together
                    </x-atoms.subtitle>
                    <div class="flex justify-start">
                        <button
                            class=" cursor-pointer relative inline-flex items-center gap-2 px-4 py-2
           bg-white text-secondary-950
           border border-white/10 rounded-full
           backdrop-blur-md
           transition-all duration-300 group">

                            <!-- Visible glow -->
                            <span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2
                 w-28 h-12 rounded-full
                 bg-[radial-gradient(circle,_rgba(2,129,199,0.45)_0%,_transparent_70%)]
                 blur-xl
                 opacity-0 scale-75
                 group-hover:opacity-100 group-hover:scale-100
                 transition-all duration-400 ease-out
                 pointer-events-none">
    </span>

                            <span class="relative z-10 font-medium">Book a call</span>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="relative z-10 h-4 w-4 transition-transform duration-300
                group-hover:translate-x-0.5 group-hover:-translate-y-0.5"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 17L17 7M17 7H8M17 7V16"/>
                            </svg>
                        </button>
                    </div>

                </div>
                <div class="flex flex-col space-y-10">
                    <p class="inline-flex mt-4 text-secondary-100 pr-32">I’m always excited to collaborate on innovative
                        projects or
                        discuss potential opportunities. Feel
                        free to reach out!</p>
                    <div class="flex  space-x-4">
                        @foreach ($socials as $social)
                            <x-button
                                class="bg-transparent backdrop-blur-md border border-white/10 text-secondary-50 hover:bg-secondary-700 "
                                round text="{{ $social['name'] }}"
                                href="{{ $social['link'] }}" position='right'
                                icon="{{ $social['icon'] }}"/>
                        @endforeach
                    </div>
                </div>
            </div>

            <hr class="mt-16 mb-10 border-gray-200"/>

            <div class="flex md:flex-row flex-col md:justify-between">
                <div class="w-full flex items-center space-x-4">
                    @foreach ($navigation as $link)
                        <li class=" list-none">
                            <a href="{{ $link['route'] ? route($link['route']) : '' }}" wire:navigate
                               class="relative font-light text-secondary-100 flex space-x-4 items-center w-full py-2 text-md ">
                                <span class="capitalize">{{ trans($link['label']) }}</span>
                            </a>
                        </li>
                    @endforeach
                </div>
                <p class="text-sm block w-full text-end text-gray-600">© 2024, All Rights Reserved</p>
            </div>
        </div>
    </section>

</div>
