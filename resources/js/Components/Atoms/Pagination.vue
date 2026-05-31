<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    links: {
        type: Array,
        required: true,
    },
})

const previous = computed(() => props.links[0])
const next = computed(() => props.links[props.links.length - 1])

const pages = computed(() => props.links.slice(1, -1))
</script>

<template>
    <nav
        v-if="links.length > 3"
        aria-label="Pagination Navigation"
        class="flex items-center justify-center space-x-2"
    >
        <!-- Previous -->
        <span
            v-if="!previous.url"
            class="cursor-not-allowed rounded-full border border-slate-300 bg-slate-100 px-6 py-3 text-sm font-medium text-gray-700"
        >
            Prev
        </span>

        <Link
            v-else
            :href="previous.url"
            class="rounded-full border border-slate-100 bg-slate-50 px-6 py-3 text-sm font-medium text-slate-500 transition-colors hover:bg-slate-100"
            preserve-scroll
        >
            Prev
        </Link>

        <!-- Pages -->
        <template v-for="link in pages" :key="link.label">
            <span
                v-if="!link.url"
                class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-50/50 text-sm text-slate-400"
                v-html="link.label"
            />

            <span
                v-else-if="link.active"
                class="flex h-12 w-12 items-center justify-center rounded-full bg-primary-500 text-sm font-bold text-white shadow-lg shadow-primary-200"
            >
                {{ link.label }}
            </span>

            <Link
                v-else
                :href="link.url"
                class="flex h-12 w-12 items-center justify-center rounded-full border border-slate-100 bg-slate-50 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100"
                preserve-scroll
            >
                {{ link.label }}
            </Link>
        </template>

        <!-- Next -->
        <span
            v-if="!next.url"
            class="cursor-not-allowed rounded-full border border-slate-300 bg-slate-100 px-6 py-3 text-sm font-medium text-gray-700"
        >
            Next
        </span>

        <Link
            v-else
            :href="next.url"
            class="rounded-full border border-slate-100 bg-slate-50 px-6 py-3 text-sm font-medium text-slate-700 transition-colors hover:bg-slate-100"
            preserve-scroll
        >
            Next
        </Link>
    </nav>
</template>
