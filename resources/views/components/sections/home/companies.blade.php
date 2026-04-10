<div>
    <section class="mt-12 bg-slate-100 p-4 sm:p-6 lg:p-8 mb-16">
        <div class="container mx-auto text-center lg:text-start">

            {{-- Header --}}
            <div class="relative flex items-start justify-center lg:justify-start">
                <h3 class="text-2xl sm:text-3xl lg:text-4xl font-semibold max-w-xs sm:max-w-sm lg:max-w-md leading-snug">
                    {{ $title }}
                    <span class="text-primary-500">{{ $highlight }}</span>
                    {{ $suffix }}
                </h3>
                <img src="{{ asset('assets/svg/companies.svg') }}" alt=""
                     class="h-12 w-12 sm:h-16 sm:w-16 lg:h-20 lg:w-20 shrink-0 rtl:hidden">
                <img src="{{ asset('assets/svg/companies-right.svg') }}" alt=""
                     class="h-12 w-12 sm:h-16 sm:w-16 lg:h-20 lg:w-20 shrink-0 ltr:hidden">
            </div>

            {{-- Grid --}}
            <div class="grid gap-2 sm:gap-3
                        grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5
                        px-0 sm:px-4 lg:px-8
                        py-6 sm:py-8 lg:py-10 xl:py-14">
                @foreach ($companies as $company)
                    <a href="{{ $company->website }}"
                       target="_blank"
                       x-data="{ zoom: false }"
                       class="border hover:cursor-pointer
                              px-3 sm:px-4 lg:px-6
                              py-3 sm:py-4
                              rounded-xl flex flex-col sm:flex-row
                              justify-center items-center gap-2
                              hover:bg-white transition-colors duration-200">
                        <img :class="{ 'scale-110': zoom }"
                             @mouseenter="zoom = true"
                             @mouseleave="zoom = false"
                             src="{{ $company->getFirstMediaUrl('logo') }}"
                             class="h-7 w-7 sm:h-9 sm:w-9 lg:h-10 lg:w-10 object-contain transition-transform duration-200"/>
                        <h2 class="text-xs sm:text-sm lg:text-base font-semibold text-black text-center leading-tight">
                            {{ $company->name }}
                        </h2>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
</div>
