<script setup>
import { computed, ref } from 'vue'

import Cta from '@/Components/Atoms/Cta.vue'
import FadeContent from '@/Components/Molecules/FadeContent.vue'

const props = defineProps({
    project: {
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
            class="relative grid max-w-6xl grid-cols-1 gap-4 rounded-b-xl bg-slate-100 px-4 py-0 pt-4 md:h-140 md:pt-8 lg:gap-16 lg:px-0 lg:pt-14 xl:grid-cols-2 xl:pt-16"
        >
            <!-- Background -->
            <img
                :src="'/assets/svg/home-hero-gradient.svg'"
                alt="Background Gradient"
                class="absolute -top-10 -start-120 hidden rotate-180 rtl:end-120 rtl:start-auto rtl:scale-x-[-1] lg:block"
                height="794"
                loading="lazy"
                width="1528"
            />

            <!-- Image -->
            <div
                class="relative order-1 overflow-hidden rounded-tl-xl rounded-br-xl hover:cursor-pointer rtl:rounded-bl-xl rtl:rounded-br-none rtl:rounded-tl-none rtl:rounded-tr-xl xl:order-2"
                @mouseenter="zoom = true"
                @mouseleave="zoom = false"
            >
                <<img
                    :alt="project.header"
                    :class="{
                        'scale-110': zoom,
                    }"
                    :src="project.logo_url"
                    aria-hidden="true"
                    class="h-full transition-transform duration-500 ease-in-out object-cover"
                    decoding="async"
                    height="1000"
                    loading="lazy"
                    width="1088"
                />
            </div>

            <!-- Content -->
            <div class="order-2 grid gap-5 p-4 sm:pe-4 sm:ps-16 sm:pb-24 sm:pt-8 xl:order-1">
                <!-- Meta -->
                <div class="flex flex-wrap items-center gap-3 text-xs uppercase tracking-widest">
                    <!-- Type -->
                    <span
                        class="rounded-md border border-gray-300 px-2 py-1 font-medium text-gray-600"
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
                        class="rounded-md bg-amber-100 px-2 py-1 normal-case tracking-normal text-amber-600"
                    >
                        In Progress
                    </span>
                </div>

                <!-- Title -->
                <h3 class="text-start text-xl font-semibold leading-snug lg:text-2xl font-display">
                    {{ project.header }}
                </h3>

                <!-- Description -->
                <p
                    class="line-clamp-3 text-start leading-relaxed text-gray-600"
                    v-html="project.description"
                />

                <!-- Footer -->
                <div class="mt-2 flex flex-col items-start gap-4">
                    <!-- Dates -->
                    <div
                        v-if="formattedDates"
                        class="flex items-center gap-1 text-xs text-gray-400"
                    >
                        {{ formattedDates }}
                    </div>

                    <!-- CTA -->
                    <Cta
                        :is-package="project.is_package"
                        :project-id="project.id"
                        :project-title="project.header"
                        :url="project.project_url"
                    />
                </div>
            </div>
        </article>
    </FadeContent>
</template>
