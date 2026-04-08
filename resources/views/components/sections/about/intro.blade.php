<section class="bg-slate-100 overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-[65fr_35fr] min-h-[880px]">

        {{-- Content --}}
        <div
            class="relative flex flex-col justify-center
                   px-6 sm:px-8 md:px-12 lg:pl-24 lg:pr-12 xl:pl-32 xl:pr-16
                   max-w-5xl py-16 lg:py-0 z-10 overflow-hidden">

            {{-- Circles background --}}
            <svg
                class="absolute
       bottom-12 sm:bottom-20 md:bottom-24 lg:bottom-24
       -left-10 sm:-left-12 md:-left-16 lg:-left-24
       w-[220px] sm:w-[280px] md:w-[340px] lg:w-[460px]
       opacity-[0.08] sm:opacity-[0.09] md:opacity-[0.1] lg:opacity-[0.04]
       blur-[0.5px] pointer-events-none z-0"
                viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg"
            >
                <g stroke="currentColor" class="text-primary-500">
                    <circle cx="190" cy="190" r="20" stroke-width="1.5"/>
                    <circle cx="190" cy="190" r="38" stroke-width="1.4"/>
                    <circle cx="190" cy="190" r="58" stroke-width="1.3"/>
                    <circle cx="190" cy="190" r="80" stroke-width="1.3"/>
                    <circle cx="190" cy="190" r="103" stroke-width="1.2"/>
                    <circle cx="190" cy="190" r="128" stroke-width="1.2"/>
                    <circle cx="190" cy="190" r="155" stroke-width="1.1"/>
                    <circle cx="190" cy="190" r="184" stroke-width="1.1"/>
                    <circle cx="190" cy="190" r="215" stroke-width="1.0"/>
                    <circle cx="190" cy="190" r="248" stroke-width="1.0"/>
                    <circle cx="190" cy="190" r="283" stroke-width="0.9"/>
                    <circle cx="190" cy="190" r="320" stroke-width="0.9"/>
                    <circle cx="190" cy="190" r="360" stroke-width="0.8"/>
                </g>
            </svg>


            {{-- Text --}}
            <div class="relative z-10">
                <x-atoms.subtitle class="">
                    {{ $title }}
                    <x-atoms.underlined-text :text="$highlight"/>
                    {{ $subtitle }}
                </x-atoms.subtitle>

                @foreach ($paragraphs as $paragraph)
                    <p class="text-base sm:text-lg md:text-xl leading-[1.9] text-gray-600 mt-6">
                        {{ $paragraph }}
                    </p>
                @endforeach

                <h5 class="text-3xl mt-12">
                    {{ $signature }}
                </h5>
            </div>
        </div>

        {{-- Desktop Image --}}
        <div class="relative hidden lg:block">
            <img
                src="{{ $image }}"
                alt="Portrait"
                class="absolute inset-0 w-full h-full object-cover object-top"
                style="filter: grayscale(15%) contrast(1.05);"
            />

            {{-- Decorative lines --}}
            <img
                src="{{ asset('assets/svg/about.svg') }}"
                alt=""
                class="absolute bottom-4 left-0 -translate-x-1/3
                       w-[360px] lg:w-[460px] xl:w-[520px]
                       opacity-80 pointer-events-none select-none"
            />
        </div>

    </div>

    {{-- Mobile Image --}}
    <div class="block lg:hidden w-full relative overflow-hidden">

        <div class="relative h-[320px] sm:h-[380px] md:h-[420px]">

            <img
                src="{{ $image }}"
                alt="Portrait"
                class="absolute inset-0 w-full h-full object-cover object-top"
                style="filter: grayscale(15%) contrast(1.05);"
            />

            {{-- Decorative lines (mobile too) --}}
            <img
                src="{{ asset('assets/svg/about.svg') }}"
                alt=""
                class="absolute bottom-0 left-0 -translate-x-1/3
                   w-[260px] sm:w-[320px] md:w-[380px]
                   opacity-70 pointer-events-none"
            />

        </div>

    </div>
</section>
