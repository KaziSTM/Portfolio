<script setup>
import {computed} from 'vue'
import {Link} from '@inertiajs/vue3'
import GithubLogo from '@/Components/Icons/GithubLogo.vue'
import InstagramLogo from '@/Components/Icons/InstagramLogo.vue'
import LinkedinLogo from '@/Components/Icons/LinkedinLogo.vue'

const props = defineProps({
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

    circle: {
        type: Boolean,
        default: false,
    },

    outline: {
        type: Boolean,
        default: false,
    },

    color: {
        type: String,
        default: 'primary',
    },

    icon: {
        type: String,
        default: null,
    },

    position: {
        type: String,
        default: 'left',
    },

    label: {
        type: String,
        default: null,
    },

    type: {
        type: String,
        default: 'button',
    },
})

const iconMap = {
    'github-logo': GithubLogo,
    'instagram-logo': InstagramLogo,
    'linkedin-logo': LinkedinLogo,
}

const iconComponent = computed(() => {
    if (!props.icon) {
        return null
    }

    return iconMap[props.icon] ?? null
})

const iconClasses = computed(() => props.circle ? 'w-4 h-4' : 'size-5')
const iconOnRight = computed(() => props.position === 'right')

const colorClasses = computed(() => {
    if (props.color === 'secondary' && props.outline) {
        return 'text-secondary-600 border-secondary-600 hover:bg-secondary-400/20 focus:ring-offset-0 focus:text-secondary-700 focus:bg-secondary-400/20 focus:ring-secondary-600 hover:text-secondary-700 dark:hover:text-secondary-500 dark:hover:bg-secondary-600/20 dark:focus:border-transparent dark:focus:text-secondary-500 dark:focus:bg-secondary-600/20 dark:focus:ring-secondary-700'
    }

    if (props.color === 'secondary') {
        return 'bg-secondary-950 text-secondary-50 hover:bg-secondary-800'
    }

    if (props.outline) {
        return 'border border-primary-200 bg-transparent text-primary-900 hover:border-primary-300 hover:bg-secondary-400'
    }

    return 'bg-primary-600 text-secondary-50 hover:bg-primary-700'
})

const shapeClasses = computed(() => {
    if (props.circle) {
        return 'w-9 h-9 rounded-full'
    }

    return [
        'justify-center px-4 py-2 text-sm font-medium',
        props.rounded ? 'rounded-full' : 'rounded-2xl',
    ]
})

const baseClasses = computed(() => [
    props.circle
        ? 'focus:shadow-outline group inline-flex items-center justify-center gap-x-2 rounded-full border text-sm outline-hidden transition-all duration-200 ease-in-out hover:shadow-sm focus:border-transparent focus:ring-2 focus:ring-offset-white enabled:cursor-pointer disabled:cursor-not-allowed disabled:opacity-50'
        : 'inline-flex shrink-0 items-center gap-2 backdrop-blur-md transition-all duration-300 focus:outline-hidden focus:ring-0',
    shapeClasses.value,
    colorClasses.value,
])
</script>

<template>
    <a
        v-if="external"
        :aria-label="label"
        :class="baseClasses"
        :href="href"
        rel="noopener noreferrer"
        target="_blank"
    >
        <component
            :is="iconComponent"
            v-if="iconComponent && !iconOnRight"
            :class="iconClasses"
        />
        <slot/>
        <component
            :is="iconComponent"
            v-if="iconComponent && iconOnRight"
            :class="iconClasses"
        />
    </a>

    <Link
        v-else-if="href"
        :aria-label="label"
        :class="baseClasses"
        :href="href"
    >
        <component
            :is="iconComponent"
            v-if="iconComponent && !iconOnRight"
            :class="iconClasses"
        />
        <slot/>
        <component
            :is="iconComponent"
            v-if="iconComponent && iconOnRight"
            :class="iconClasses"
        />
    </Link>

    <button
        v-else
        :aria-label="label"
        :class="baseClasses"
        :type="type"
    >
        <component
            :is="iconComponent"
            v-if="iconComponent && !iconOnRight"
            :class="iconClasses"
        />
        <slot/>
        <component
            :is="iconComponent"
            v-if="iconComponent && iconOnRight"
            :class="iconClasses"
        />
    </button>
</template>
