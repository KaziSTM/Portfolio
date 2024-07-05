<div>
    <section class="py-10 bg-slate-900 sm:pt-16 lg:pt-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-32">
                <div class="space-y-16 ">
                    <x-atoms.subtitle class="text-white">Lets make something great together
                    </x-atoms.subtitle>
                    <div class="flex justify-start">
                        <x-button color="white">
                            <span>Book a call</span>
                            <x-icon name="arrow-up-right"
                                class="h-5 w-5 transform transition-transform duration-300 group-hover:translate-y-[-2px]" />
                        </x-button>
                    </div>

                </div>
                <div class="flex flex-col space-y-10">
                    <p class="inline-flex mt-4 text-secondary-100 pr-32">I’m always excited to collaborate on innovative
                        projects or
                        discuss potential opportunities. Feel
                        free to reach out!</p>
                    <div class="flex  space-x-4">
                        @foreach ($socials as $social)
                            <x-button color="border-secondary-300" round color="white" text="{{ $social['name'] }}"
                                outline href="{{ $social['link'] }}" position='right' icon="{{ $social['icon'] }}" />
                        @endforeach
                    </div>
                </div>
            </div>

            <hr class="mt-16 mb-10 border-gray-200" />

            <div class="flex justify-between">
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
                <p class="text-sm block w-full text-end text-gray-600">© 2024, All Rights Reserved by Nezrek Youcef</p>
            </div>
        </div>
    </section>

</div>
