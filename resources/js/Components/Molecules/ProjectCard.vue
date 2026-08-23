<script setup>
import { computed, ref } from 'vue'

import Cta from '@/Components/Atoms/Cta.vue'
import FadeContent from '@/Components/Molecules/FadeContent.vue'

const props = defineProps({
    project: {
        type: Object,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const zoom = ref(false)

const formattedDates = computed(() => {
    const start = props.project.start_year
    const end = props.project.end_year

    if (!start) {
        return null
    }

    if (end) {
        return `${start} — ${end}`
    }

    if (props.project.is_in_progress) {
        return `${start} — Present`
    }

    return start
})
</script>

<template>
    <FadeContent
        :blur="true"
        :delay="200"
        :duration="1000"
        :initial-opacity="0"
        :threshold="0.1"
        class-name="my-fade-content"
        easing="ease-out"
    >
        <article
            class="relative grid max-w-6xl grid-cols-1 gap-4 rounded-b-xl bg-slate-100 px-4 py-0 md:h-120 lg:gap-16 lg:px-0 xl:grid-cols-2"
        >
            <!-- Image -->
            <div
                class="relative order-1 overflow-hidden rounded-tl-xl rounded-br-xl hover:cursor-pointer rtl:rounded-bl-xl rtl:rounded-br-none rtl:rounded-tl-none rtl:rounded-tr-xl xl:order-2 h-full"
                @mouseenter="zoom = true"
                @mouseleave="zoom = false"
            >
                <img
                    :alt="project.header"
                    :class="{
                        'scale-110': zoom,
                    }"
                    :src="project.logo_url"
                    aria-hidden="true"
                    class="h-full w-full transition-transform duration-500 ease-in-out object-cover"
                    decoding="async"
                    height="1000"
                    loading="lazy"
                    width="1088"
                />
            </div>

            <!-- Content -->
            <div class="order-2 flex flex-col justify-between p-6 sm:ps-12 sm:pe-6 sm:pb-8 sm:pt-6 lg:ps-16 xl:order-1 h-full">
                <!-- Top Group -->
                <div>
                    <!-- Meta / Badge -->
                    <div class="mt-2 sm:mt-4 mb-4 flex flex-wrap items-center gap-3 text-xs uppercase tracking-widest">
                        <!-- Type -->
                        <span
                            class="rounded-md border border-gray-300 px-2.5 py-1 font-medium text-gray-600"
                            v-text="project.type_label"
                        ></span>

                        <!-- Roles -->
                        <div class="flex items-center gap-2 text-gray-400">
                            <template v-for="(role, index) in project.role_labels" :key="role">
                                <span>
                                    {{ role }}
                                </span>

                                <span
                                    v-if="index !== project.role_labels.length - 1"
                                    class="opacity-30"
                                >
                                    •
                                </span>
                            </template>
                        </div>

                        <!-- Progress -->
                        <span
                            v-if="project.is_in_progress"
                            class="rounded-md bg-amber-100 px-2.5 py-1 normal-case tracking-normal text-amber-600 font-medium"
                        >
                            {{ translations.projects?.ongoing ?? translations.projects?.in_progress ?? 'Ongoing' }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h3 class="mb-3 sm:mb-4 text-start text-xl font-semibold leading-snug lg:text-2xl font-display text-gray-900">
                        {{ project.header }}
                    </h3>

                    <!-- Description -->
                    <p
                        class="mb-6 sm:mb-8 line-clamp-3 text-start leading-relaxed text-gray-600"
                        v-html="project.description"
                    />
                </div>

                <!-- Footer (CTA at bottom) -->
                <div class="mt-auto pt-4 pb-2 flex flex-col items-start gap-3">
                    <!-- Dates -->
                    <div
                        v-if="formattedDates"
                        class="flex items-center gap-1 text-xs text-gray-400"
                    >
                        {{ formattedDates }}
                    </div>

                    <!-- CTA (Plain text, no background, no shadow) -->
                    <Cta
                        :plain="true"
                        :is-package="project.is_package"
                        :project-id="project.id"
                        :project-title="project.header"
                        :translations="translations"
                        :url="project.project_url"
                    />
                </div>
            </div>
        </article>
    </FadeContent>
</template>
