<div>

    {{-- HERO --}}
    <section class="max-w-6xl mx-auto px-6 pt-28 pb-20">

        {{-- Main Tags --}}
        <div class="flex flex-wrap items-center gap-3 mb-8">

            {{-- Type (accent but soft) --}}
            <span class="px-4 py-2 text-sm font-medium rounded-full
                 bg-primary-500/10 text-primary-600 ring-1 ring-primary-500/20">
        {{ $project->type->label() }}
    </span>

            {{-- Roles (neutral + elegant) --}}
            @foreach ($project->roles() as $role)
                <span class="px-4 py-2 text-sm rounded-full
                     bg-white text-gray-700 ring-1 ring-gray-200
                     hover:bg-gray-50 transition">
            {{ $role->label() }}
        </span>
            @endforeach

        </div>

        {{-- Tech Tags --}}
        <div class="flex flex-wrap gap-3 mb-8">
            @foreach ($project->techTags()->take(4) as $tag)
                <span class="px-4 py-2 text-sm bg-gray-200 rounded-full text-gray-600">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>

        {{-- Title --}}
        <h1 class="text-4xl md:text-6xl font-semibold leading-tight tracking-tight text-gray-900 max-w-5xl">
            {{ $project->header }}
        </h1>

    </section>

    {{-- HERO IMAGE --}}
    @if ($project->getFirstMediaUrl('logo'))
        <section class="max-w-7xl mx-auto">
            <img src="{{ $project->getFirstMediaUrl('logo') }}"
                 class="w-full object-cover"/>
        </section>
    @endif

    {{-- CONTENT --}}
    <section class="max-w-6xl mx-auto px-6 py-24 grid grid-cols-1 md:grid-cols-3 gap-16">

        {{-- LEFT META --}}
        <div class="space-y-8 text-sm text-gray-500">

            {{-- Company --}}
            <div>
                <p class="font-medium text-gray-900 mb-1">{{ __('ui.projects.client') }}</p>
                <p>{{ $project->company?->name ?? __('ui.projects.personal_project') }}</p>
            </div>

            {{-- Industry --}}
            @if ($project->company?->industry)
                <div>
                    <p class="font-medium text-gray-900 mb-1">{{ __('ui.projects.industry') }}</p>
                    <p>{{ $project->company->industry }}</p>
                </div>
            @endif

            {{-- Company Size --}}
            @if ($project->company?->size)
                <div>
                    <p class="font-medium text-gray-900 mb-1">{{ __('ui.projects.company_size') }}</p>
                    <p>{{ $project->company->size }}</p>
                </div>
            @endif

            {{-- Headquarters --}}
            @if ($project->company?->headquarter)
                <div>
                    <p class="font-medium text-gray-900 mb-1">{{ __('ui.projects.headquarters') }}</p>
                    <p>{{ $project->company->headquarter }}</p>
                </div>
            @endif



            {{-- Duration --}}
            <div>
                <p class="font-medium text-gray-900 mb-1">{{ __('ui.projects.duration') }}</p>
                <p>
                    @if ($project->start)
                        {{ $project->start->translatedFormat('M Y') }}
                    @endif

                    @if ($project->end)
                        - {{ $project->end->translatedFormat('M Y') }}
                    @elseif ($project->is_in_progress)
                        - {{ __('ui.projects.present') }}
                    @endif
                </p>
            </div>

            {{-- Website --}}
            @if ($project->company?->website)
                <div>
                    <p class="font-medium text-gray-900 mb-1">{{ __('ui.projects.website') }}</p>
                    <a href="{{ $project->company->website }}"
                       target="_blank"
                       class="text-gray-700 hover:underline">
                        {{ parse_url($project->company->website, PHP_URL_HOST) }}
                    </a>
                </div>
            @endif

            {{-- CTA --}}
            @if ($project->link)
                <div>
                    <a href="{{ $project->link }}"
                       target="_blank"
                       class="inline-flex items-center px-5 py-3 bg-gray-900 text-white rounded-full text-sm font-medium hover:bg-gray-800 transition">
                        {{ __('ui.actions.visit_project') }}
                        <x-icon name="arrow-up-right" class="w-4 h-4 ml-2"/>
                    </a>
                </div>
            @endif

        </div>

        {{-- RIGHT CONTENT --}}
        <div class="md:col-span-2 space-y-8 text-gray-700">

            {{-- Intro --}}
            <p class="text-xl leading-relaxed text-gray-900 font-medium">
                {!! $project->description !!}
            </p>

            {{-- Markdown --}}
            <div class="prose prose-lg max-w-none prose-gray
                        prose-headings:font-semibold
                        prose-h2:text-2xl
                        prose-p:text-gray-600
                        prose-li:text-gray-600">

                {!! \Illuminate\Support\Str::markdown($project->details) !!}
            </div>

        </div>

    </section>

    {{-- GALLERY --}}
    @if ($project->getMedia('images')->count())
        <section class="max-w-7xl mx-auto px-6 pb-24 grid gap-8 md:grid-cols-2">

            @foreach ($project->getMedia('images') as $image)
                <img src="{{ $image->getUrl() }}"
                     class="w-full rounded-lg"/>
            @endforeach

        </section>
    @endif

    @if ($project->testimonials->isNotEmpty())
        <x-organisms.testimonials :project="$project"/>
    @endif
</div>
