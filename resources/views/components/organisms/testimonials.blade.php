@if ($project->testimonials->isNotEmpty())
    <section class="py-28 bg-[#f5f6f7]">

        <div class="max-w-5xl mx-auto px-6 text-center">

            {{-- Title --}}
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-20">
                {{ __('ui.projects.testimonials_title', ['company' => $project->company?->name ?? __('ui.projects.personal_project')]) }}
            </h2>

            {{-- Carousel --}}
            <div
                x-data="{
                current: 0,
                total: {{ $project->testimonials->count() }},
                next() { this.current = (this.current + 1) % this.total },
                prev() { this.current = (this.current - 1 + this.total) % this.total }
            }"
                class="relative"
            >

                {{-- Slides --}}
                <div class="relative h-[360px] flex items-center justify-center">

                    @foreach ($project->testimonials as $index => $testimonial)
                        <div
                            x-bind:class="current === {{ $index }}
                            ? 'opacity-100 translate-y-0'
                            : 'opacity-0 translate-y-6 pointer-events-none'"
                            class="absolute transition-all duration-500 ease-out w-full flex justify-center"
                        >

                            {{-- CARD --}}
                            <div
                                class="relative bg-white/60 backdrop-blur-sm rounded-2xl px-12 py-12 shadow-sm max-w-3xl w-full text-left">

                                {{-- Quote SVG (exact style) --}}
                                <svg
                                    class="absolute top-0 left-0 w-16 h-16 text-gray-900 transform -translate-x-6 -translate-y-8"
                                    viewBox="0 0 16 16"
                                    fill="none"
                                    aria-hidden="true"
                                >
                                    <path
                                        d="M7.39762 10.3C7.39762 11.0733 7.14888 11.7 6.6514 12.18C6.15392 12.6333 5.52552 12.86 4.76621 12.86C3.84979 12.86 3.09047 12.5533 2.48825 11.94C1.91222 11.3266 1.62421 10.4467 1.62421 9.29999C1.62421 8.07332 1.96459 6.87332 2.64535 5.69999C3.35231 4.49999 4.33418 3.55332 5.59098 2.85999L6.4943 4.25999C5.81354 4.73999 5.26369 5.27332 4.84476 5.85999C4.45201 6.44666 4.19017 7.12666 4.05926 7.89999C4.29491 7.79332 4.56983 7.73999 4.88403 7.73999C5.61716 7.73999 6.21938 7.97999 6.69067 8.45999C7.16197 8.93999 7.39762 9.55333 7.39762 10.3ZM14.6242 10.3C14.6242 11.0733 14.3755 11.7 13.878 12.18C13.3805 12.6333 12.7521 12.86 11.9928 12.86C11.0764 12.86 10.3171 12.5533 9.71484 11.94C9.13881 11.3266 8.85079 10.4467 8.85079 9.29999C8.85079 8.07332 9.19117 6.87332 9.87194 5.69999C10.5789 4.49999 11.5608 3.55332 12.8176 2.85999L13.7209 4.25999C13.0401 4.73999 12.4903 5.27332 12.0713 5.85999C11.6786 6.44666 11.4168 7.12666 11.2858 7.89999C11.5215 7.79332 11.7964 7.73999 12.1106 7.73999C12.8437 7.73999 13.446 7.97999 13.9173 8.45999C14.3886 8.93999 14.6242 9.55333 14.6242 10.3Z"
                                        fill="currentColor"/>
                                </svg>

                                {{-- Content --}}
                                <blockquote class="relative z-10 max-w-2xl">

                                    <p class="text-lg text-gray-700 leading-relaxed italic">
                                        {{ $testimonial->content }}
                                    </p>

                                    {{-- Centered Divider --}}
                                    <div class="mt-8 pt-6 border-t border-gray-200 w-3/4 mx-auto"></div>

                                </blockquote>

                                {{-- Footer --}}
                                <footer class="mt-8 flex items-center justify-between">

                                    {{-- Author --}}
                                    <div class="flex items-center gap-4">

                                        @if ($testimonial->avatar)
                                            <img src="{{ $testimonial->avatar }}"
                                                 class="w-10 h-10 rounded-full object-cover"/>
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-gray-200"></div>
                                        @endif

                                        <div>
                                            <p class="font-medium text-gray-900">
                                                {{ $testimonial->author_name }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ $testimonial->author_role }}
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Stars --}}
                                    <div class="flex gap-1 text-yellow-400">
                                        @for ($i = 0; $i < $testimonial->rating; $i++)
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.978h4.18c.969 0 1.371 1.24.588 1.81l-3.385 2.46 1.287 3.978c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.367 2.42c-.784.57-1.838-.197-1.539-1.118l1.287-3.978-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.18l1.285-3.978z"/>
                                            </svg>
                                        @endfor
                                    </div>

                                </footer>

                            </div>

                        </div>
                    @endforeach

                </div>

                {{-- Controls --}}
                <div class="flex justify-center gap-8 mt-12 text-sm text-gray-400">

                    <button @click="prev"
                            class="hover:text-gray-900 transition">
                        ← {{ __('ui.actions.prev') }}
                    </button>

                    <button @click="next"
                            class="hover:text-gray-900 transition">
                        {{ __('ui.actions.next') }} →
                    </button>

                </div>

            </div>

        </div>

    </section>
@endif
