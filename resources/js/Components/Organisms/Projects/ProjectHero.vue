<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

defineProps({
    project: {
        type: Object,
        required: true,
    },
})

const page = usePage()

const ongoingLabel = computed(() => {
    return page.props.translations?.projects?.ongoing ?? page.props.translations?.projects?.in_progress ?? 'Ongoing'
})
</script>

<template>
    <section class="mx-auto max-w-6xl px-4 sm:px-6 pb-10 sm:pb-20 pt-20 sm:pt-28 min-w-0">
        <!-- Type & Roles -->
        <div class="mb-6 sm:mb-8 flex flex-wrap items-center gap-2 sm:gap-3">
            <span
                class="rounded-full bg-slate-200 px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-slate-900"
                v-text="project.type_label"
            ></span>

            <span
                v-if="!project.end && project.is_in_progress"
                class="rounded-full bg-amber-100 px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-amber-700"
                v-text="ongoingLabel"
            ></span>

            <span
                v-for="role in project.role_labels"
                :key="role"
                class="rounded-full bg-white px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm text-gray-700 ring-1 ring-gray-200 transition hover:bg-gray-50"
                v-text="role"
            ></span>
        </div>

        <!-- Tech Tags -->
        <div v-if="project.tech_tags?.length" class="mb-6 sm:mb-8 flex flex-wrap gap-2 sm:gap-3">
            <span
                v-for="tag in project.tech_tags"
                :key="tag"
                class="rounded-full bg-gray-200 px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm text-gray-700"
                v-text="tag"
            ></span>
        </div>

        <!-- Title -->
        <h1
            class="max-w-5xl text-xl sm:text-3xl md:text-5xl font-semibold leading-snug tracking-tight text-gray-900 break-words [overflow-wrap:anywhere] min-w-0"
            v-text="project.header"
        ></h1>
    </section>
</template>
