<div class="bg-white">
    {{-- HERO --}}
    <section class="max-w-5xl mx-auto px-6 pt-28 pb-10 text-center">
        <h1 class="text-4xl md:text-6xl font-semibold tracking-tight text-gray-900">
            My Work
        </h1>
        <p class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">
            A selection of projects focused on building scalable systems, APIs, and modern digital platforms.
        </p>

        {{-- FILTERS --}}
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
    </section>

    {{-- PROJECTS GRID --}}
    <section class="max-w-6xl mx-auto px-6 pb-32 pt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-32">
            @foreach ($this->projects as $index => $project)
                <div class="flex justify-center">
                    <x-molecules.list-projects-card
                        :project="$project"
                        :reverse="$index % 2 !== 0"
                    />
                </div>
            @endforeach
        </div>

        {{-- CUSTOM PAGINATION --}}
        <div class="mt-48">
            {{ $this->projects->links('components.atoms.pagination') }}
        </div>
    </section>
</div>
