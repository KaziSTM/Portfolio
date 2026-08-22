<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const props = defineProps({
    projectId: {
        type: [String, Number],
        required: true,
    },

    isPackage: {
        type: Boolean,
        default: false,
    },
    projectTitle: {
        type: String,
        required: true,
    },
    url: {
        type: String,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
    hasBorder: {
        type: Boolean,
        default: true,
    },
    plain: {
        type: Boolean,
        default: false,
    },
})

const page = usePage()

const label = computed(() => {
    return props.isPackage ? props.translations.view_package : props.translations.view_case_study
})
</script>

<template>
    <div class="z-50">
        <Link
            :aria-label="`${label}: ${projectTitle}`"
            :href="url"
            :class="[
                plain
                    ? 'group inline-flex items-center gap-2 text-sm font-semibold text-primary-700 transition-all duration-300 hover:text-primary-800'
                    : 'group inline-flex items-center gap-2 rounded-full bg-secondary-50 px-5 py-2.5 text-sm font-semibold text-primary-700 transition-all duration-300 hover:bg-secondary-100 hover:scale-[1.02] active:scale-[0.98]',
                !plain && hasBorder ? 'shadow-xs border border-secondary-200/60 hover:shadow-md' : ''
            ]"
            target="_blank"
        >
            <span v-text="label"></span>

            <svg
                class="h-4 w-4 transform transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    d="M7 17L17 7M17 7H8M17 7V16"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                />
            </svg>
        </Link>
    </div>
</template>
