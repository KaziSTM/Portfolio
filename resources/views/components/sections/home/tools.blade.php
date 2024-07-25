<div>
    <section class="relative flex flex-col items-center mt-12 px-4 sm:px-6 lg:px-8" x-data="{ tools: @entangle('tools') }">
        <div class="flex flex-wrap justify-center space-x-4 sm:space-x-8 lg:space-x-12">
            @foreach ($tools as $index => $tool)
                <div
                    class="relative min-w-20 h-20 {{ $index % 4 == 0 ? 'mt-3' : ($index % 4 == 1 ? 'mt-6' : ($index % 4 == 2 ? 'mt-9' : 'mt-0')) }} bg-white shadow-sm rounded-full flex flex-col items-center justify-center">
                    <img src="{{ asset($tool['src']) }}" alt="{{ $tool['alt'] }}" class="h-8 w-8 sm:h-12 sm:w-12">
                </div>
            @endforeach
        </div>
        <div class="hidden lg:flex absolute top-32 right-0">
            <img src="{{ asset('assets/svg/tools.svg') }}" alt="arrow" class="h-12 w-12 sm:h-16 sm:w-16">
            <h3 class="text-xl w-[60%] relative top-8 rotate-10">The tools I use on my day-to-day</h3>
        </div>
    </section>

</div>
