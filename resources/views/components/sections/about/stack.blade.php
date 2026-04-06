<div>
    <section class="container mx-auto text-start lg:text-left pb-6">
        <div
            class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:gap-32 px-12 md:px-16 lg:px-32 xl:px-48 md:py-12 lg:py-24 xl:py-32">
            <div class="order-2 lg:order-1">
                <div>
                    <img sizes="(min-width: 1024px) 33vw, 100vw" class="rounded-2xl"
                        src="{{ asset('assets/images/portrait-3.jpg') }}" alt="About Image" class="">
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <x-atoms.subtitle class="leading-loose">
                    A simple stack that you can
                    <div class="relative text-primary-200 inline-flex mb-2 ">
                        <svg class="absolute  inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 249 22" fill="currentColor"
                            class="dHctYWJzb2x1dGU dHctbGVmdC0w dHctdG9wLTIvMw dHctaC0[0.6em] dHctdy1mdWxs dHctZmlsbC1za3ktMjAwLzc1">
                            <path
                                d="M247.564 18.5807C241.772 13.3568 232.473 12.7526 225.225 11.4427C217.124 9.97395 208.996 8.57031 200.846 7.46093C186.542 5.51302 172.169 4.08854 157.79 3.01562C126.033 0.645827 94.0929 0.0338481 62.3387 2.36979C42.1785 3.85416 22.008 5.90885 2.32917 10.8463C-0.0155171 11.4349 0.207047 14.6719 2.6889 14.7083C22.0261 14.9896 41.3866 12.6406 60.7109 11.8568C79.9471 11.0807 99.2274 10.6719 118.484 10.9557C142.604 11.3125 166.719 12.8333 190.722 15.5156C199.956 16.5469 209.195 17.6016 218.411 18.8255C227.864 20.0807 237.259 22 246.767 20.7422C247.709 20.6198 248.426 19.3568 247.564 18.5807Z">
                            </path>
                        </svg>
                        <h1 class="relative z-20 text-primary-700 flex space-x-2">
                            <span>always trust</span>
                        </h1>
                    </div>
                </x-atoms.subtitle>
                <p class="mt-6 text-lg lg:text-xl text-gray-700">With over 5 years as a software developer, I’ve
                    seen many changes in technology, but my core stack has remained a constant. Throughout my
                    career, I’ve developed and refined my skills with the following technologies.</p>
                <div class="mt-6 grid grid-cols-2 gap-4">
                    @foreach ($tools as $tool)
                        <div class="flex space-x-4 items-center p-4 border rounded-lg bg-slate-100">
                            <img class="h-8 w-8 sm:h-12 sm:w-12" aria-hidden="true" alt="{{ $tool['alt'] }}"
                                src="{{ asset($tool['src']) }}" />
                            <h3 class="text-lg font-semibold">{{ $tool['alt'] }}</h3>
                            {{-- <p class="text-muted-foreground">7+ years of experience</p> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
