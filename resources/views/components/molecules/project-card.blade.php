<div>
    <div
        class="grow rounded-b-xl px-4 grid grid-cols-1 lg:px-0 xl:grid-cols-2 gap-4 lg:gap-16 bg-slate-100 pt-4 py-0 md:pt-8 lg:pt-14 xl:pt-16">

        {{-- Image --}}
        <div x-data="{ zoom: false }"
             class="hover:cursor-pointer relative overflow-hidden order-1 xl:order-2 rounded-tl-xl rounded-br-xl">
            <img :class="{ 'scale-110': zoom }"
                 @mouseenter="zoom = true"
                 @mouseleave="zoom = false"
                 src="{{ $project->getFirstMediaUrl('logo') }}"
                 class="transition-transform duration-500 ease-in-out w-full h-full"/>
        </div>

        {{-- Content --}}
        <div class="p-4 sm:pt-8 sm:pl-16 sm:pb-24 sm:pr-4 grid gap-6 xl:order-1 order-2">

            {{-- Main Roles (subtle, uppercase, spaced) --}}
            <div class="flex items-center gap-3 text-xs tracking-widest uppercase text-gray-400">
                @foreach ($project->roles() as $role)
                    <span>{{ $role->label() }}</span>
                    @if (! $loop->last)
                        <span class="opacity-30">•</span>
                    @endif
                @endforeach
            </div>

            {{-- Title --}}
            <h4 class="text-xl lg:text-2xl font-semibold mt-1 leading-snug">
                {{ $project->header }}
            </h4>

            {{-- Description --}}
            <p class="text-gray-600 leading-relaxed">
                {!! $project->description !!}
            </p>

            {{-- Tech Tags (inline / subtle / no pills) --}}
            <div class="flex flex-wrap gap-x-4 gap-y-1 text-sm text-gray-400">
                @foreach ($project->techTags() as $tag)
                    <span class="hover:text-gray-600 transition">
                        #{{ \Illuminate\Support\Str::slug($tag->name) }}
                    </span>
                @endforeach
            </div>

            {{-- CTA --}}
            <a class="text-sm font-medium text-gray-900 mt-4 flex items-center space-x-2 group"
               href="{{ $project->link }}"
               target="_blank">
                <span>View case study</span>
                <x-icon name="arrow-up-right"
                        class="h-4 w-4 transform transition-transform duration-300 group-hover:translate-y-[-2px]"/>
            </a>

        </div>
    </div>
</div>
