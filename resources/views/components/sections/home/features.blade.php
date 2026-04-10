<div>
    <x-atoms.section class="bg-slate-100">
        <div class="container mx-auto text-center lg:text-start space-y-20">

            {{-- Header --}}
            <div
                class="grid grid-cols-1 xl:grid-cols-2 gap-10 md:gap-16 xl:gap-24 items-center px-4 sm:px-8 md:px-12 lg:px-16">
                <x-atoms.subtitle>
                    {{ $title }}
                </x-atoms.subtitle>

                <p class="mt-6 text-lg lg:text-xl text-start text-gray-700">
                    {!! $description !!}
                </p>
            </div>

            {{-- Content --}}
            <div
                class="flex flex-col lg:flex-row gap-12 lg:gap-16 xl:gap-20 items-center px-4 sm:px-8 md:px-12 lg:px-16">

                {{-- Features --}}
                <div class="relative grid gap-10 md:gap-14 lg:gap-20 grid-cols-1">
                    @foreach ($features as $feature)
                        <div class="flex items-start gap-6">
                            <div
                                class="relative min-w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center">
                                <x-dynamic-component :component="$feature['icon']"
                                                     class="text-secondary-100 w-6 h-6"/>
                                @if (!$loop->last)
                                    <div
                                        class="absolute top-20 w-px border-s-2 border-dotted border-secondary-300 h-full">
                                    </div>
                                @endif
                            </div>

                            <div class="w-full md:w-3/4">
                                <h4 class="text-lg md:text-xl font-semibold text-start">
                                    {{ $feature['title'] }}
                                </h4>
                                <p class="mt-2 text-sm md:text-base text-gray-700 text-start">
                                    {{ $feature['description'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                    {{-- Decorative --}}
                    <div class="hidden lg:block absolute -bottom-32 left-12">
                        <h3 class="text-xl w-[60%] translate-y-16 translate-x-20 -rotate-[10deg] rtl:translate-y-20 rtl:translate-x-20">
                            {{ __('ui.home.features_caption') }}
                        </h3>
                        @svg('feature-arrow','rtl:-translate-x-16 rtl-skew-6')
                    </div>
                </div>

                {{-- CV CTA --}}
                <div class="relative w-full flex justify-center">

                    <div class="relative inline-block">
                        <img src="{{ asset('assets/images/feature_section.png') }}" alt="Feature Image"
                             class="w-full max-w-[500px] md:max-w-[600px] h-[320px] md:h-[520px] object-cover rounded-xl shadow-xl">

                        {{-- Decorative Star --}}
                        <img
                            src="{{ asset('assets/svg/star.svg') }}"
                            alt="decorative star"
                            class="absolute -top-5 -end-6 w-8 md:w-12 lg:w-14 pointer-events-none select-none"
                        />
                    </div>

                    {{-- CV CTA --}}
                    <div
                        class="absolute bottom-4 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 md:start-auto md:end-6 md:translate-x-0 rtl:md:translate-x-0">
                        <a href="{{ asset('assets/docs/Youcef_Nezrek_CV.pdf') }}"
                           class="group flex items-center gap-3 bg-white/90 backdrop-blur px-3 py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-200">

                            <div
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-900 text-white">
                                <x-icon name="download-simple"
                                        class="w-5 h-5 group-hover:translate-y-0.5 transition"/>
                            </div>

                            <div class="text-start">
                                <p class="text-sm font-semibold text-slate-900">
                                    {{ __('ui.actions.download_cv') }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ __('ui.actions.view_experience') }}
                                </p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </x-atoms.section>
</div>
