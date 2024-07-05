<div>
    <section class="mt-12 bg-slate-100 p-4 sm:p-6 lg:p-8 mb-16">
        <div class="container mx-auto text-center lg:text-left ">
            <div class="relative xl:w-[50%] flex ">
                <h3 class="text-3xl xl:w-[50%] ">
                    These are some
                    <span class="text-primary-500">companies</span>
                    I have worked with
                </h3>
                <img src="{{ asset('assets/svg/companies.svg') }}" alt="arrow" class="h-16 w-16 sm:h-24 sm:w-24">
            </div>
            <div class="grid gap-2 grid-cols-2 xl:grid-cols-5 py-8 lg:py-10 xl:py-16">
                @foreach ($companies as $index => $company)
                    <a href="{{ $company->website }}" target="blank" x-data="{ zoom: false }"
                        class="border hover:cursor-pointer px-6 py-4 rounded-xl flex justify-center items-center">
                        <img :class="{ 'scale-110': zoom }" @mouseenter="zoom = true" @mouseleave="zoom = false"
                            src="{{ asset($company->getFirstMediaUrl('logo')) }}" class="h-8 w-8  sm:h-12 sm:w-12">
                        <h1 class="text-xl font-bold text-black ">{{ $company->name }}
                        </h1>
                    </a>
                @endforeach
            </div>
            </ <div class="container mx-auto text-center lg:text-left space-y-20">
    </section>

</div>
