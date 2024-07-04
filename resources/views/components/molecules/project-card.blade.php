<div>
    <div
        class="grow rounded-b-xl px-4 grid grid-cols-1 lg:px-0 xl:grid-cols-2 gap-4 lg:gap-16 bg-slate-100 pt-4 py-0 md:pt-8 lg:pt-14 xl:pt-16">
        <div x-data="{ zoom: false }"
            class="hover:cursor-pointer relative overflow-hidden order-1 xl:order-2 rounded-tl-xl rounded-br-xl">
            <img :class="{ 'scale-110': zoom }" @mouseenter="zoom = true" @mouseleave="zoom = false"
                src="{{ $project->getFirstMediaUrl('logo') }}" alt="Descriptive Alt Text"
                class="transition-transform duration-500 ease-in-out w-full h-full" />
        </div>
        <div class="p-4 sm:pt-8 sm:pl-16 sm:pb-24 sm:pr-4 grid gap-6 xl:order-1 order-2 ">
            <div class="flex space-x-4">
                @foreach ($project->tags as $tag)
                    <h4 class="text-base text-primary-500 ">
                        {{ $tag->name }}
                    </h4>
                @endforeach
            </div>
            <h4 class="text-xl lg:text-2xl font-bold mt-4">
                {{ $project->header }}
            </h4>
            <p class="mt-4 text-gray-700">{!! $project->description !!}</p>
            <a class="text-primary-500 font-semibold mt-8 flex items-center space-x-2 group" href="{{ $project->url }}"
                target="_blank">
                <span>View case study</span>
                <x-icon name="arrow-up-right"
                    class="h-5 w-5 transform transition-transform duration-300 group-hover:translate-y-[-2px]" />
            </a>

        </div>
    </div>
</div>
