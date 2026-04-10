<div class="relative" dir="auto">
    <img loading="lazy" width="1728" height="894" src="{{ asset('assets/svg/home-hero-gradient.svg') }}"
         class="absolute top-0 start-0 rtl:right-0 rtl:-rotate-180 w-full">

    <x-atoms.section>
        <div class="container mx-auto text-center lg:text-start">
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 xl:gap-24 items-center px-4 sm:px-8 md:px-12 lg:px-16">

                {{-- Text / CTA column --}}
                <div class="">
                    <x-atoms.title>
                        <div class="relative text-primary-400 inline-flex mb-2">
                            <svg
                                class="absolute w-2/5 inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10 "
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 249 22" fill="currentColor">
                                <path
                                    d="M247.564 18.5807C241.772 13.3568 232.473 12.7526 225.225 11.4427C217.124 9.97395 208.996 8.57031 200.846 7.46093C186.542 5.51302 172.169 4.08854 157.79 3.01562C126.033 0.645827 94.0929 0.0338481 62.3387 2.36979C42.1785 3.85416 22.008 5.90885 2.32917 10.8463C-0.0155171 11.4349 0.207047 14.6719 2.6889 14.7083C22.0261 14.9896 41.3866 12.6406 60.7109 11.8568C79.9471 11.0807 99.2274 10.6719 118.484 10.9557C142.604 11.3125 166.719 12.8333 190.722 15.5156C199.956 16.5469 209.195 17.6016 218.411 18.8255C227.864 20.0807 237.259 22 246.767 20.7422C247.709 20.6198 248.426 19.3568 247.564 18.5807Z">
                                </path>
                            </svg>
                            <h1 class="relative z-20 text-black flex gap-2">
                                <span>{{ $kicker }}</span>
                            </h1>
                        </div>
                        {{ $title }}
                    </x-atoms.title>

                    <p class="mt-6 text-lg lg:text-xl text-gray-700">{!! $description !!}</p>

                    <div
                        class="mt-8 flex flex-col sm:flex-row items-center sm:items-start sm:justify-center lg:justify-start gap-4">

                        <button
                            class="bg-secondary-950 py-2 px-6 border border-secondary-200 rounded-2xl transition-colors focus:outline-hidden hover:bg-primary-800 duration-75 hover:text-secondary-50">
                            <span class="capitalize font-semibold text-secondary-100">
                                {{ $ctaLabel }}
                            </span>
                        </button>

                        <div class="flex justify-center items-center gap-4">
                            @foreach ($socials as $social)
                                <x-button.circle
                                    color="secondary"
                                    outline
                                    href="{{ $social['link'] }}"
                                    icon="{{ $social['icon'] }}"/>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Portrait column --}}
                <div class="relative flex justify-center mb-12 lg:mb-0">
                    <div
                        class="hidden lg:block absolute -top-12 start-auto end-auto -translate-x-6 rtl:translate-x-6 -start-2">
                        <h3 class="text-3xl -rotate-[10deg] ">
                            {{$intro}}
                        </h3>
                        @svg('hero-arrow','rtl:skew-4')
                    </div>

                    <img
                        src="{{ asset('assets/images/portrait.png') }}"
                        alt="Hero Image"
                        class="w-full max-w-[420px] md:max-w-[480px] lg:max-w-[512px] h-auto object-cover rounded-xl shadow-xl "
                    />
                </div>

            </div>
        </div>
    </x-atoms.section>
</div>
