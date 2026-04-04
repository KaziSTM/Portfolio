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
        <div class="p-4 sm:pt-8 sm:pl-16 sm:pb-24 sm:pr-4 grid gap-5 xl:order-1 order-2">

            {{-- Meta Line --}}
            <div class="flex flex-wrap items-center gap-3 text-xs tracking-widest uppercase">

                {{-- Type (slightly stronger, outlined pill) --}}
                <span class="px-2 py-1 border border-gray-300 rounded-md text-gray-600 font-medium">
                    {{ $project->type->label() }}
                </span>

                {{-- Roles (muted inline) --}}
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
                        In progress
                    </span>
                @endif
            </div>

            {{-- Title --}}
            <h4 class="text-xl lg:text-2xl font-semibold leading-snug">
                {{ $project->header }}
            </h4>

            {{-- Description --}}
            <p class="text-gray-600 leading-relaxed line-clamp-3">
                {!! $project->description !!}
            </p>


            {{-- Footer --}}
            <div class="flex items-center justify-between mt-2">

                {{-- Dates --}}
                <div class="text-xs text-gray-400">
                    @if ($project->start)
                        <span>{{ $project->start->format('Y') }}</span>
                    @endif

                    @if ($project->end)
                        <span>— {{ $project->end->format('Y') }}</span>
                    @elseif ($project->is_in_progress)
                        <span>— Present</span>
                    @endif
                </div>

                {{-- CTA --}}
                @if ($project->link)
                    <a class="text-sm font-medium text-gray-900 flex items-center space-x-2 group"
                       href="{{ route('projects.show',['projectId'=>$project->id]) }}"
                       target="_blank">
                        <span>{{ $project->isPackage() ? 'View package' : 'View case study' }}</span>
                        <x-icon name="arrow-up-right"
                                class="h-4 w-4 transform transition-transform duration-300 group-hover:translate-y-[-2px]"/>
                    </a>
                @endif

            </div>

        </div>
    </div>
</div>
