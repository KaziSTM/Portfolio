<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const locales = computed(() => page.props.locales)
const currentLocale = computed(() => page.props.locale)
</script>

<template>
    <div
        class="flex items-center gap-2 rounded-full border border-slate-200 bg-white p-1"
    >
        <Link
            v-for="locale in locales"
            :key="locale.key"
            :href="locale.url"
            class="rounded-full px-3 py-1 text-xs font-semibold transition-all duration-200"
            :class="
                locale.key === currentLocale
                    ? 'bg-slate-900 text-white shadow-sm'
                    : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900'
            "
        >
            {{ locale.label }}
        </Link>
    </div>
</template>
