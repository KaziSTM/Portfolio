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
            class="group flex items-center space-x-2 text-sm font-medium text-primary-700"
            target="_blank"
        >
            <span v-text="label"></span>

            <svg
                class="h-4 w-4 transform transition-transform duration-300 group-hover:-translate-y-0.5"
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
