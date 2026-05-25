<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    href: {
        type: String,
        default: null,
    },

    external: {
        type: Boolean,
        default: false,
    },

    rounded: {
        type: Boolean,
        default: false,
    },
})
</script>

<template>
    <a
        v-if="external"
        :href="href"
        target="_blank"
        rel="noopener noreferrer"
        :class="[
            'inline-flex items-center gap-2 transition-all duration-300',
            rounded && 'rounded-full',
        ]"
    >
        <slot />
    </a>

    <Link
        v-else-if="href"
        :href="href"
        :class="[
            'inline-flex items-center gap-2 transition-all duration-300',
            rounded && 'rounded-full',
        ]"
    >
        <slot />
    </Link>

    <button
        v-else
        :class="[
            'inline-flex items-center gap-2 transition-all duration-300',
            rounded && 'rounded-full',
        ]"
    >
        <slot />
    </button>
</template>
