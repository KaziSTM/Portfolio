<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

import Carousel from '@/Components/Organisms/Carousel.vue'
import Quotes from '@/Components/Icons/Quotes.vue'
import Subtitle from '@/Components/Atoms/Subtitle.vue'
import DotGrid from '@/Components/Atoms/DotGrid.vue'

const page = usePage()

const section = computed(() => page.props.cms.testimonials ?? {})
const header = computed(() => section.value.header ?? {})
const testimonials = computed(() => section.value.content ?? [])
const actionsTranslation = computed(() => page.props.translations.actions ?? {})

const hasTestimonials = computed(() => testimonials.value.length > 0)
</script>

<template>
    <section class="bg-secondary-50 overflow-hidden py-24 relative">
        <!-- Full section background -->
        <div class="absolute inset-0 pointer-events-none opacity-20">
            <DotGrid
                :dot-size="3"
                :gap="10"
                :max-speed="5000"
                :proximity="120"
                :resistance="750"
                :return-duration="1.5"
                :shock-radius="250"
                :shock-strength="5"
                :speed-trigger="100"
                active-color="#087d6f"
                base-color="#08b89d"
                class-name="custom-dot-grid"
            />
        </div>
        <div class="px-6 sm:px-8 md:px-12 lg:ps-24 lg:pe-12 xl:ps-32 xl:pe-16 max-w-5xl mx-auto">
            <!-- Header -->
            <div class="max-w-2xl mb-16">
                <Subtitle v-text="header.title" />

                <template v-if="header.paragraphs?.length">
                    <p
                        v-for="(paragraph, index) in header.paragraphs"
                        :key="index"
                        class="mt-6 text-base sm:text-lg md:text-xl leading-[1.9] text-gray-600 text-start"
                        v-text="paragraph"
                    />
                </template>
            </div>

            <!-- Testimonials -->
            <div v-if="hasTestimonials" class="relative">
                <!-- Carousel -->
                <div class="relative z-10">
                    <Carousel :items="testimonials" show-controls show-indicators>
                        <template #slide="{ item }">
                            <div
                                class="relative bg-white/80 backdrop-blur-sm rounded-2xl px-6 sm:px-12 py-10 sm:py-12 shadow-sm max-w-3xl mx-auto w-full text-left border border-white/50"
                            >
                                <!-- Quote -->
                                <Quotes
                                    class="absolute top-0 left-0 w-16 h-16 text-gray-900 -translate-x-6 -translate-y-8"
                                />

                                <!-- Content -->
                                <blockquote class="relative z-10">
                                    <p class="text-lg leading-relaxed italic text-gray-700">
                                        {{ item.content }}
                                    </p>

                                    <div class="mt-8 pt-6 border-t border-gray-200" />
                                </blockquote>

                                <!-- Author -->
                                <footer class="mt-8 flex items-center gap-4">
                                    <img
                                        v-if="item.avatar"
                                        :alt="item.author"
                                        :src="item.avatar"
                                        class="w-12 h-12 rounded-full object-cover"
                                        decoding="async"
                                        loading="lazy"
                                    />

                                    <div v-else class="w-12 h-12 rounded-full bg-gray-200" />

                                    <div>
                                        <p class="font-medium text-gray-900" v-text="item.author" />

                                        <p class="text-sm text-gray-500" v-text="item.role" />
                                    </div>
                                </footer>
                            </div>
                        </template>

                        <template #prev> ← {{ actionsTranslation.prev }} </template>

                        <template #next> {{ actionsTranslation.next }} → </template>
                    </Carousel>
                </div>
            </div>
        </div>
    </section>
</template>
