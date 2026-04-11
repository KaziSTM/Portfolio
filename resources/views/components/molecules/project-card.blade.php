<div
    class="relative  md:h-140 rounded-b-xl max-w-6xl px-4 grid grid-cols-1 lg:px-0 xl:grid-cols-2 gap-4 lg:gap-16 bg-slate-100 pt-4 py-0 md:pt-8 lg:pt-14 xl:pt-16">

    {{-- Image --}}
    <div x-data="{ zoom: false }"
         class="hover:cursor-pointer relative overflow-hidden order-1 xl:order-2 rounded-tl-xl rounded-br-xl rtl:rounded-tl-none rtl:rounded-br-none rtl:rounded-tr-xl rtl:rounded-bl-xl ">
        <img :class="{ 'scale-110': zoom }"
             @mouseenter="zoom = true"
             @mouseleave="zoom = false"
             src="{{ $project->getFirstMediaUrl('logo') }}"
             class="transition-transform duration-500 ease-in-out h-full "/>
    </div>

    <img loading="lazy" width="1528" height="794" src="{{ asset('assets/svg/home-hero-gradient.svg') }}"
         class="hidden lg:block absolute rotate-180 -start-[30rem] -top-10 rtl:scale-x-[-1] rtl:end-[30rem] rtl:start-auto">

    {{-- Content --}}
    <div class="p-4 sm:pt-8 sm:ps-16 sm:pb-24 sm:pe-4 grid gap-5 xl:order-1 order-2">

        {{-- Meta Line --}}
        <div class="flex flex-wrap items-center gap-3 text-xs tracking-widest uppercase">

            {{-- Type --}}
            <span class="px-2 py-1 border border-gray-300 rounded-md text-gray-600 font-medium">
                {{ $project->type->label() }}
            </span>

            {{-- Roles --}}
            <div class="flex items-center gap-2 text-gray-400">
                @foreach ($project->roles() as $role)
                    <span>{{ $role->label() }}</span>
                    @if (! $loop->last)
                        <span class="opacity-30">•</span>
                    @endif
                @endforeach
            </div>

            {{-- In Progress --}}
            @if ($project->is_in_progress)
                <span class="px-2 py-1 rounded-md bg-amber-100 text-amber-600 normal-case tracking-normal">
                    {{ __('ui.projects.in_progress') }}
                </span>
            @endif
        </div>

        {{-- Title --}}
        <h4 class="text-xl lg:text-2xl font-semibold leading-snug text-start">
            {{ $project->header }}
        </h4>

        {{-- Description --}}
        <p class="text-gray-600 leading-relaxed line-clamp-3 text-start">
            {!! $project->description !!}
        </p>

        {{-- Footer --}}
        <div class="flex flex-col items-start gap-4 mt-2">

            {{-- Dates --}}
            <div class="text-xs text-gray-400 flex items-center gap-1">
                @if ($project->start)
                    <span>{{ $project->start->format('Y') }}</span>
                @endif

                @if ($project->end)
                    <span>— {{ $project->end->format('Y') }}</span>
                @elseif ($project->is_in_progress)
                    <span>— {{ __('ui.projects.present') }}</span>
                @endif
            </div>

            {{-- CTA --}}
            <x-atoms.cta :projectId="$project->id" :isPackage="$project->isPackage()"/>

        </div>
    </div>
</div>
