<script setup>
import { onBeforeUnmount, ref, watch } from 'vue'
import { Link } from '@inertiajs/vue3'

defineProps({
    navigation: {
        type: Object,
        required: true,
    },
})

const modalOpen = ref(false)

const closeMenu = () => {
    modalOpen.value = false
}

watch(modalOpen, (open) => {
    if (typeof document === 'undefined') {
        return
    }

    document.body.style.overflow = open ? 'hidden' : ''
})

onBeforeUnmount(() => {
    if (typeof document !== 'undefined') {
        document.body.style.overflow = ''
    }
})
</script>

<template>
    <div class="relative z-50 flex h-auto w-auto xl:hidden">
        <div
            :class="[
                'z-10000 -top-6 transition-all duration-300',
                modalOpen ? 'fixed top-6 inset-e-6' : 'absolute inset-e-1',
            ]"
        >
            <button
                :aria-expanded="modalOpen"
                aria-label="Toggle mobile menu"
                class="relative flex size-12 items-center justify-center rounded-full text-secondary-900 transition-colors duration-300 focus:outline-hidden focus:ring-0"
                type="button"
                @click="modalOpen = !modalOpen"
            >
                <span
                    :class="modalOpen ? 'rotate-45' : '-translate-y-1.5'"
                    class="absolute h-0.5 w-5 rounded-full bg-current transition-all duration-300"
                />
                <span
                    :class="modalOpen ? 'opacity-0' : 'opacity-100'"
                    class="absolute h-0.5 w-5 rounded-full bg-current transition-all duration-300"
                />
                <span
                    :class="modalOpen ? '-rotate-45' : 'translate-y-1.5'"
                    class="absolute h-0.5 w-5 rounded-full bg-current transition-all duration-300"
                />
            </button>
        </div>

        <Transition name="mobile-menu">
            <div v-if="modalOpen" class="fixed inset-x-0 top-0 bottom-0 z-9999">
                <div
                    class="mobile-menu-overlay absolute inset-0 bg-black/50"
                    @click="closeMenu"
                />

                <div class="mobile-menu-panel mobile-menu-layer-white absolute inset-y-0 right-0 w-full max-w-110 bg-secondary-50" />
                <div class="mobile-menu-panel mobile-menu-layer-red absolute inset-y-0 right-0 w-full max-w-110 bg-primary-500" />

                <aside
                    class="mobile-menu-panel mobile-menu-drawer absolute inset-y-0 right-0 w-full max-w-110 overflow-hidden bg-secondary-50 text-secondary-950 shadow-2xl backdrop-blur-xl pt-20"
                >
                    <div class="flex h-full flex-col overflow-y-auto px-6 py-8">
                        <ul class="group space-y-4">
                            <li
                                v-for="(item, index) in navigation"
                                :key="index"
                                class="mobile-menu-item flex items-start justify-between gap-4 border-b border-secondary-950/10 pb-4 transition-opacity duration-300 group-hover:opacity-35 hover:opacity-100!"
                                :style="{ '--item-index': index }"
                            >
                                <div class="min-w-0">
                                    <div class="mb-2 text-xs font-medium uppercase text-primary-500">
                                        {{ String(index + 1).padStart(2, '0') }}
                                    </div>

                                    <Link
                                        :href="item.route || item.href || '#'"
                                        class="block font-display text-xl font-semibold uppercase leading-none tracking-[-0.08em] text-secondary-950 transition-colors duration-300 hover:text-[#D4AF37]"
                                        @click="closeMenu"
                                    >
                                        {{ item.label || item.name }}
                                    </Link>
                                </div>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </Transition>
    </div>
</template>

<style scoped>
.mobile-menu-enter-active,
.mobile-menu-leave-active {
    transition: opacity 200ms ease;
}

.mobile-menu-enter-from,
.mobile-menu-leave-to {
    opacity: 0;
}

.mobile-menu-overlay {
    opacity: 1;
    transition: opacity 250ms ease-out;
}

.mobile-menu-enter-from .mobile-menu-overlay,
.mobile-menu-leave-to .mobile-menu-overlay {
    opacity: 0;
}

.mobile-menu-panel {
    transform: translateX(0);
    transition-property: transform;
    transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
}

.mobile-menu-layer-white {
    transition-duration: 450ms;
}

.mobile-menu-layer-red {
    transition-delay: 50ms;
    transition-duration: 550ms;
}

.mobile-menu-drawer {
    transition-delay: 100ms;
    transition-duration: 650ms;
}

.mobile-menu-enter-from .mobile-menu-panel,
.mobile-menu-leave-to .mobile-menu-panel {
    transform: translateX(100%);
}

.mobile-menu-leave-active .mobile-menu-panel {
    transition-delay: 0ms;
    transition-duration: 350ms;
    transition-timing-function: cubic-bezier(0.55, 0, 1, 0.45);
}

.mobile-menu-item {
    opacity: 1;
    transform: translateY(0);
    transition:
        opacity 450ms ease,
        transform 450ms cubic-bezier(0.22, 1, 0.36, 1);
    transition-delay: calc(180ms + (var(--item-index) * 60ms));
}

.mobile-menu-enter-from .mobile-menu-item,
.mobile-menu-leave-to .mobile-menu-item {
    opacity: 0;
    transform: translateY(28px);
}

.mobile-menu-leave-active .mobile-menu-item {
    transition-delay: 0ms;
    transition-duration: 180ms;
}
</style>
