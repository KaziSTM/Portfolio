<script setup>
import {computed} from 'vue'
import {Link, usePage} from '@inertiajs/vue3'

const props = defineProps({
    label: {
        type: String,
        required: true,
    },

    href: {
        type: String,
        required: true,
    },
})

const page = usePage()

const normalizePath = (value) => {
    if (! value) {
        return '/'
    }

    const url = value.startsWith('http')
        ? new URL(value)
        : new URL(value, window.location.origin)

    return url.pathname.replace(/\/+$/, '') || '/'
}

const isActive = computed(() => {
    return normalizePath(page.url) === normalizePath(props.href)
})
</script>

<template>
    <li class="list-none">
        <Link
            :class="
                isActive
                    ? 'active font-medium text-slate-900'
                    : 'font-light text-slate-500'
            "
            :href="href"
            class="relative flex items-center space-x-4 w-full px-4 py-2 text-md underline-half transition-all duration-200"
        >
            <slot/>

            <span class="capitalize">
                {{ label }}
            </span>
        </Link>
    </li>
</template>
