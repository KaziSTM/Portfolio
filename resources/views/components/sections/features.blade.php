<div>
    <x-atoms.section class="bg-slate-100 ">
        <div class="container mx-auto text-center lg:text-left space-y-20">
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-12 md:gap-24 xl:gap-32 items-center">
                <x-atoms.subtitle class="leading-loose">
                    I'm your
                    <div class="relative text-primary-200 inline-flex mb-2 ">
                        <svg class="absolute  inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 249 22" fill="currentColor"
                            class="dHctYWJzb2x1dGU dHctbGVmdC0w dHctdG9wLTIvMw dHctaC0[0.6em] dHctdy1mdWxs dHctZmlsbC1za3ktMjAwLzc1">
                            <path
                                d="M247.564 18.5807C241.772 13.3568 232.473 12.7526 225.225 11.4427C217.124 9.97395 208.996 8.57031 200.846 7.46093C186.542 5.51302 172.169 4.08854 157.79 3.01562C126.033 0.645827 94.0929 0.0338481 62.3387 2.36979C42.1785 3.85416 22.008 5.90885 2.32917 10.8463C-0.0155171 11.4349 0.207047 14.6719 2.6889 14.7083C22.0261 14.9896 41.3866 12.6406 60.7109 11.8568C79.9471 11.0807 99.2274 10.6719 118.484 10.9557C142.604 11.3125 166.719 12.8333 190.722 15.5156C199.956 16.5469 209.195 17.6016 218.411 18.8255C227.864 20.0807 237.259 22 246.767 20.7422C247.709 20.6198 248.426 19.3568 247.564 18.5807Z">
                            </path>
                        </svg>
                        <h1 class="relative z-20 text-primary-700 flex space-x-2">
                            <span>all-in-one</span>
                        </h1>
                    </div>
                    project solution
                </x-atoms.subtitle>
                <p class="mt-6 text-lg lg:text-xl text-gray-700">{!! $description !!}</p>
            </div>
            <div class="flex flex-col lg:flex-row gap-12 md:gap-12 lg:gap-16 xl:gap-20 items-center">
                <div class="relative grid gap-10 xxs:gap-20 xs:gap-20 sm:gap-28 md:gap-14 lg:gap-24 grid-cols-1 ">
                    @foreach ($features as $feature)
                        <div
                            class="flex {{ $loop->last ? 'mt-0 xxs:mt-1 xs:mt-6 sm:mt-0 md:mt-0 lg:mt-0' : '' }} justify-start md:jsutify-center items-start space-x-7 ">
                            <div
                                class="relative min-w-20 h-20 bg-slate-900 shadow-sm rounded-full flex flex-col items-center justify-center gap-y-6">
                                <x-icon name="{{ $feature['icon'] }}" class="text-secondary-100 font-bold w-8 h-6" />
                                @if (!$loop->last)
                                    <div class="-ml-0.5 absolute top-24 w-px border-l-4 border-dotted border-secondary-300 h-full"
                                        aria-hidden="true">
                                    </div>
                                @endif
                            </div>
                            <div class="w-4/6 md:w-3/5">
                                <h4 class="text-xl font-semibold ">
                                    {{ $feature['title'] }}
                                </h4>
                                <p class="mt-2 text-base md:text-lg text-gray-700">{{ $feature['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="hidden lg:block absolute -bottom-32 left-12">
                        <h3 class="text-xl w-[60%] translate-y-16 translate-x-20 -rotate-10">What differentiates me from
                            others</h3>
                        <?xml version="1.0" encoding="utf-8"?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="81" height="83" viewBox="0 0 81 83"
                            fill="none"
                            class="dHctcmVsYXRpdmU dHctdy0yMA dHctaC1hdXRv LXR3LXRvcC0y dHctdGV4dC1zbGF0ZS02MDA">
                            <g clip-path="url(#clip0_112_68)">
                                <path
                                    d="M79.0279 62.2024C58.1227 60.567 37.0551 52.8379 23.5836 35.8709C19.6389 30.9027 16.5994 23.913 14.6598 17.809C14.25 16.519 14.0629 15.1736 13.8444 13.8392C13.6447 12.6204 8.83154 19.8767 8.22696 20.6903C1.76323 29.3888 8.93024 20.1844 10.9563 16.5611C12.5286 13.7492 13.3857 10.1847 15.3992 7.63962C17.0205 5.59024 20.2035 9.67344 21.5513 10.8281C22.9371 12.0152 33.1749 18.4514 29.1817 20.1187C22.0175 23.1101 14.7009 22.4979 7.21764 22.9016"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_112_68">
                                    <rect width="85" height="29" fill="white"
                                        transform="translate(21.4469 0.837036) rotate(46.0556)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="relative grid mt-14 sm:mt-0 mb-12 lg:mb-0">
                    <img src="{{ asset('assets/images/feature_section.png') }}" alt="Hero Image"
                        class="w-screen lg:w-[110vh] h-[350px] md:h-[540px] object-cover rounded-xl shadow-xl">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Hero Image"
                        class="w-20 hidden lg:block absolute -top-9 -right-9">
                    <div class="hidden md:block absolute top-1/4 right-1/2 p-4 rounded-full bg-white opacity-65">
                        <img src="{{ asset('assets/svg/download.svg') }}" alt="cv"
                            class="w-40 animate-spin-slow" />
                    </div>
                    <x-button.circle loading  href="{{ asset('assets/docs/Youcef_Nezrek_CV.pdf') }}"
                        class="hidden md:flex absolute top-1/3 right-1/2 md:min-w-20 md:h-20 lg:min-w-16 xl:min-w-20 lg:h-16 xl:h-20 md:-translate-x-14 md:translate-y-2 lg:-translate-x-12 xl:-translate-x-14 lg:translate-y-1.5 xl:translate-y-2" lg color="black"
                        icon="download-simple" />
                    <div
                        class="absolute -bottom-24 right-10 w-2/3 h-48 flex justify-center items-center space-x-6 rounded-2xl p-10 bg-primary-700 opacity-80">
                        <div class="grid gap-4 mt-2 text-center">
                            <span class="font-extrabold text-white text-3xl">03</span>
                            <span class="text-secondary-50 font-semibold text-base">Years of experience</span>
                        </div>
                        <div class="grid gap-4 mt-2 text-center">
                            <span class="font-extrabold text-white text-3xl">09</span>
                            <span class="text-secondary-50 font-semibold text-base">Projects Completed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-atoms.section>
</div>
