<div class="relative">
    <img loading="lazy" width="1728" height="894" src="{{ asset('assets/svg/home-hero-gradient.svg') }}"
        class="absolute top-0">
    <x-atoms.section>
        <div class="container mx-auto text-center lg:text-left">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 md:gap-24 xl:gap-32 items-center">
                <div class="">
                    <x-atoms.title>
                        <div class="relative text-primary-200 inline-flex mb-2">
                            <svg class="absolute w-2/5 inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 249 22" fill="currentColor"
                                class="dHctYWJzb2x1dGU dHctbGVmdC0w dHctdG9wLTIvMw dHctaC0[0.6em] dHctdy1mdWxs dHctZmlsbC1za3ktMjAwLzc1">
                                <path
                                    d="M247.564 18.5807C241.772 13.3568 232.473 12.7526 225.225 11.4427C217.124 9.97395 208.996 8.57031 200.846 7.46093C186.542 5.51302 172.169 4.08854 157.79 3.01562C126.033 0.645827 94.0929 0.0338481 62.3387 2.36979C42.1785 3.85416 22.008 5.90885 2.32917 10.8463C-0.0155171 11.4349 0.207047 14.6719 2.6889 14.7083C22.0261 14.9896 41.3866 12.6406 60.7109 11.8568C79.9471 11.0807 99.2274 10.6719 118.484 10.9557C142.604 11.3125 166.719 12.8333 190.722 15.5156C199.956 16.5469 209.195 17.6016 218.411 18.8255C227.864 20.0807 237.259 22 246.767 20.7422C247.709 20.6198 248.426 19.3568 247.564 18.5807Z">
                                </path>
                            </svg>
                            <h1 class="relative z-20 text-black flex space-x-2">
                                <span>Helping</span>
                                <span>businesses </span>
                            </h1>
                        </div>
                        turn their ideas into reality
                    </x-atoms.title>
                   <p class="mt-6 text-lg lg:text-xl text-gray-700">{!! $description !!}</p>
                    <div class="mt-8 flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-4">
                        <button
                            class="bg-secondary-950 py-2 px-6 border rounded-2xl transition-color focus:outline-none hover:bg-primary-800 duration-75 hover:text-secondary-50">
                            <span class="capitalize font-semibold text-secondary-100 ">
                                {{ 'Book a call with me' }}</span>
                        </button>
                        <div class="flex justify-center items-center space-x-4">
                            @foreach ($socials as $social)
                                <x-button.circle color="secondary" outline href="{{ $social['link'] }}"
                                    icon="{{ $social['icon'] }}" />
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="relative flex justify-center mb-12 lg:mb-0">
                    <div class="hidden md:block absolute -top-12 -left-2">
                        <h3 class="text-3xl -translate-x-6 -rotate-10">Hi,I'm Youcef!</h3>
                        <?xml version="1.0" encoding="utf-8"?>
                        <svg class="-rotate-[60deg] -translate-x-6 w-[200px]" id="master-artboard"
                            viewBox="0 0 1400 980" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            style="enable-background:new 0 0 1400 980;">
                            <path d="M 260.79998779296875 86.19999694824219"
                                style="fill: rgb(23, 168, 247); fill-opacity: 1; stroke: rgb(0, 0, 0); stroke-opacity: 1; stroke-width: 0; paint-order: fill;" />
                            <g
                                transform="matrix(0.0018328310688957574, -9.6078519821167, -9.6078519821167, -0.0018328310688957574, 1168.819348724845, 988.0170288085938)">
                                <g>
                                    <!-- Reversed path direction -->
                                    <path
                                        d="M19.3253 77.6737C14.1134 76.5032 11.6329 74.3731 9.5344 69.5548C9.21134 68.8129 8.19484 63.1864 7.53037 63.112C6.25335 62.9691 3.21916 70.4678 2.9682 71.2948C1.40658 76.4418 6.28171 76.9284 10.5148 77.213C11.502 77.2793 17.7243 77.9867 16.755 78.0657C13.5771 78.3248 9.99484 77.7788 6.85897 77.2296C3.24474 76.5966 0.348605 75.1774 5.76428 74.151C20.2216 71.4112 32.2897 67.5184 44.2548 58.8791C46.8111 57.0334 66.6654 36.3021 53.849 37.3949C42.243 38.3844 36.7985 53.1087 36.7673 62.5332C36.7215 76.3709 51.0557 78.6989 62.3048 74.1115C83.3723 65.5204 93.9574 46.1137 100.676 26.5417"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        style="fill: rgb(255, 255, 255); fill-opacity: 0; stroke: rgb(0, 0, 0);"
                                        transform="matrix(0.9999999999999999, 0, 0, 0.9999999999999999, 2.0752495397696578, -3.40787419626605)" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <img src="{{ asset('assets/images/portrait.png') }}" alt="Hero Image"
                        class="w-[512px] h-[640px] object-cover rounded-xl shadow-xl">
                </div>
            </div>
        </div>
    </x-atoms.section>
</div>
