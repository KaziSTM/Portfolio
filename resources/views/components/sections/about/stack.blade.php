<section class="container mx-auto text-start lg:text-left pb-6  mt-16 md:mt-0">
    <div
        class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:gap-32 px-4 md:px-16 lg:px-32 xl:px-48 md:py-12 lg:py-24 xl:py-32">
        <div class="order-2 lg:order-1">
            <div>
                <img sizes="(min-width: 1024px) 33vw, 100vw" class="rounded-2xl"
                     src="{{ asset('assets/images/portrait-3.jpg') }}" alt="About Image" class="">
            </div>
        </div>
        <div class="order-1 lg:order-2">
            <x-atoms.subtitle class="leading-loose">
                {{$title}}
                <x-atoms.underlined-text :text="$highlight"/>
            </x-atoms.subtitle>

            <p class="mt-6 text-lg lg:text-xl text-gray-700">{{$paragraph}}</p>
            <div class="mt-6 grid grid-cols-2 gap-4">
                @foreach ($tools as $tool)
                    <div class="flex space-x-4 items-center p-4 border rounded-lg bg-slate-100">
                        <img class="h-8 w-8 sm:h-12 sm:w-12" aria-hidden="true" alt="{{ $tool['alt'] }}"
                             src="{{ asset($tool['src']) }}"/>
                        <h3 class="text-lg font-semibold">{{ $tool['alt'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

