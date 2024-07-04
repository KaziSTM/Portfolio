<div>
    <x-atoms.section class='mt-16'>
        <div class="container mx-auto text-center lg:text-left space-y-20">
            <div class="flex flex-col items-center">
                <x-atoms.subtitle class="leading-loose">
                    {!! $title !!}
                </x-atoms.subtitle>
                <div class="px-2 md:px-20 lg:px-48 xl:px-96 text-center break-words">
                    <p class="mt-6 text-lg lg:text-xl text-gray-700">{!! $description !!}</p>
                </div>
            </div>
        </div>
        <div class="grid gap-4 mt-20 px-4 sm:px-16 ">
            @foreach ($projects as $project)
                <x-molecules.project-card :project="$project" />
            @endforeach
        </div>
    </x-atoms.section>
</div>
