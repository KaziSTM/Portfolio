<div>
    <div>
        <section class="container mx-auto text-start lg:text-left">
            <div class="grid grid-cols-1 lg:grid-cols-5 xl:gap-12">
                <div class="col-span-2 lg:pl-32 xl:pl-48 py-4 lg:py-32">
                    <x-atoms.subtitle class="leading-loose">
                        My career
                        <div class="relative text-primary-200 inline-flex mb-2 ">
                            <svg class="absolute  inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 249 22" fill="currentColor"
                                class="dHctYWJzb2x1dGU dHctbGVmdC0w dHctdG9wLTIvMw dHctaC0[0.6em] dHctdy1mdWxs dHctZmlsbC1za3ktMjAwLzc1">
                                <path
                                    d="M247.564 18.5807C241.772 13.3568 232.473 12.7526 225.225 11.4427C217.124 9.97395 208.996 8.57031 200.846 7.46093C186.542 5.51302 172.169 4.08854 157.79 3.01562C126.033 0.645827 94.0929 0.0338481 62.3387 2.36979C42.1785 3.85416 22.008 5.90885 2.32917 10.8463C-0.0155171 11.4349 0.207047 14.6719 2.6889 14.7083C22.0261 14.9896 41.3866 12.6406 60.7109 11.8568C79.9471 11.0807 99.2274 10.6719 118.484 10.9557C142.604 11.3125 166.719 12.8333 190.722 15.5156C199.956 16.5469 209.195 17.6016 218.411 18.8255C227.864 20.0807 237.259 22 246.767 20.7422C247.709 20.6198 248.426 19.3568 247.564 18.5807Z">
                                </path>
                            </svg>
                            <h1 class="relative z-20 text-primary-500 flex space-x-2">
                                <span>journey</span>
                            </h1>
                        </div>
                        so far
                    </x-atoms.subtitle>
                    <p class="mt-6 text-sm lg:text-base text-gray-700">My journey in web development started with a
                        fascination for creating engaging online experiences. Over the years, I've mastered the TALL
                        stack and worked on diverse projects, from e-commerce platforms to custom CMS solutions.
                        Each project has helped me grow as a developer, reinforcing my passion for learning and
                        delivering high-quality, user-focused solutions.</p>
                </div>
                <ol class="col-span-3 py-4 lg:py-32 lg:pr-28 xl:pr-36 grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($jobs as $key => $job)
                        <div class="relative p-4 rounded-lg">
                            <div class="flex flex-col mb-2 space-y-6">
                                <div class="p-2 rounded-lg border border-slate-200 bg-slate-100 max-w-fit">
                                    <img src="{{ asset($job->company->getFirstMediaUrl('logo')) }}"
                                        alt="{{ $job->company->name . '-logo' }}" class="w-6 h-6" />
                                </div>
                                <span
                                    class="font-semibold text-sm leading-5 text-primary-700">{{ $job->duration }}</span>
                                <span
                                    class="absolute text-[6rem] font-bold font-mono text-slate-100 right-1  -top-8">{{ sprintf('%02d', $key + 1) }}</span>
                            </div>
                            <h2 class="text-xl font-bold capitalize">{{ $job->company->name }}</h2>
                            <p class="mt-6 text-sm lg:text-base  text-gray-700">{{ $job->description }}</p>
                        </div>
                    @endforeach
                </ol>
            </div>
        </section>
    </div>
