<section class="container mx-auto text-start lg:text-left  mt-16 md:mt-0">
    <div class="grid grid-cols-1 lg:grid-cols-5 xl:gap-12">
        <div class="col-span-2 lg:pl-32 xl:pl-48 py-4 lg:py-32">

            <x-atoms.subtitle class="leading-loose">
                My career
                <x-atoms.underlined-text text="journey"/>
                so far
            </x-atoms.subtitle>
            <p class="mt-6 text-sm lg:text-base text-gray-700">{{$paragraph}}</p>

            <a href="{{ asset('assets/docs/Youcef_Nezrek_CV.pdf') }}"
               class="flex space-x-2 items-center w-1/2 bg-slate-100 mt-6 py-2 px-6 border rounded-2xl focus:outline-none">
                <span class="capitalize font-semibold text-secondary-900 ">Download CV</span>
                <x-icon name="download-simple"
                        class="h-5 w-5 transform transition-transform duration-300 group-hover:translate-y-[-2px]"/>
            </a>
        </div>
        <ol class="col-span-3 py-4 lg:py-32 lg:pr-28 xl:pr-36 grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($jobs as $key => $job)
                <div class="relative p-4 rounded-lg">
                    <div class="flex flex-col mb-2 space-y-6">
                        <div class="p-2 rounded-lg border border-slate-200 bg-slate-100 max-w-fit">
                            <img src="{{ asset($job->company->getFirstMediaUrl('logo')) }}"
                                 alt="{{ $job->company->name . '-logo' }}" class="w-6 h-6"/>
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

