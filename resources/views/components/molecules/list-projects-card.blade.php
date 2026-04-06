@props([
    'project',
    'reverse' => false,
])

<div @class([
    "bg-slate-100 p-8 md:py-10 md:px-16 h-full",
    "rounded-2xl", // Base radius for all corners
    "mt-36 rounded-br-[3rem]" => $reverse, // Extra radius on bottom-left if reversed
    "rounded-tl-[3rem]" => !$reverse,      // Extra radius on top-right if NOT reversed
])>

    <div class="grid gap-10">

        {{-- IMAGE (TOP OR BOTTOM) --}}
        @unless($reverse)
            <div class="mb-2">
                <img
                    src="{{ $project->getFirstMediaUrl('logo') }}"
                    alt="{{ $project->header }}"
                    class="w-full h-auto object-contain"
                />
            </div>
        @endunless

        {{-- CONTENT --}}
        <div class="space-y-10">
            <div class="flex items-center justify-between">
                {{-- TYPE --}}
                <span
                    class="inline-block text-[10px] tracking-widest uppercase text-gray-500 border border-gray-300 rounded px-2 py-1">
                 {{ $project->type->label() }}
                </span>

                {{-- ROLES --}}
                <div class="text-xs tracking-widest uppercase text-gray-400 flex flex-wrap gap-2">
                    @foreach ($project->roles() as $role)
                        <span>{{ $role->label() }}</span>
                    @endforeach
                </div>
            </div>

            {{-- TITLE --}}
            <span class="text-2xl font-semibold text-gray-900 leading-tight max-w-xs">
                {{ $project->header }}
            </span>

        </div>

        {{-- FOOTER --}}
        <x-atoms.cta :projectId="$project->id" :isPackage="$project->isPackage()"/>

        {{-- IMAGE (BOTTOM ON REVERSED) --}}
        @if($reverse)
            <div class="mt-2">
                <img
                    src="{{ $project->getFirstMediaUrl('logo') }}"
                    alt="{{ $project->header }}"
                    class="w-full h-auto object-contain"
                />
            </div>
        @endif

    </div>

</div>
