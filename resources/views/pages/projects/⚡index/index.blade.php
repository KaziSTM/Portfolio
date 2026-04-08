<section class="relative max-w-6xl mx-auto px-4 sm:px-6 pb-24 sm:pb-28 lg:pb-32 pt-8 sm:pt-10 space-y-8 md:space-y-16">


    <div class="mt-10 flex flex-wrap justify-center gap-3">
        <button wire:click="setRole(null)"
            @class([
                "px-5 py-2 rounded-full text-sm font-medium transition-all duration-200",
                "bg-gray-900 text-white shadow-lg" => !$role,
                "bg-gray-100 text-gray-600 hover:bg-gray-200" => $role
            ])>
            All
        </button>

        @foreach ($this->roles as $roleItem)
            <button wire:click="setRole('{{ $roleItem->value }}')"
                @class([
                    "px-5 py-2 rounded-full text-sm font-medium transition-all duration-200",
                    "bg-gray-900 text-white shadow-lg" => $role === $roleItem->value,
                    "bg-gray-100 text-gray-600 hover:bg-gray-200" => $role !== $roleItem->value
                ])>
                {{ $roleItem->label() }}
            </button>
        @endforeach
    </div>
    <div
        class="grid grid-cols-1 md:grid-cols-2
               items-start
               gap-y-10 sm:gap-y-12 md:gap-y-16 lg:gap-y-20
               gap-x-6 md:gap-x-10 lg:gap-x-14">


        @foreach ($this->projects as $index => $project)
            <div class="relative h-full overflow-hidden">
                <x-molecules.list-projects-card
                    :project="$project"
                    :reverse="$index % 2 !== 0"
                />
            </div>
        @endforeach

    </div>

    {{-- PAGINATION --}}
    <div class="relative z-20 mt-16 sm:mt-20">
        {{ $this->projects->links('components.atoms.pagination') }}
    </div>

</section>
