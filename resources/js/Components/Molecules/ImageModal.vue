<script setup>
import { computed, ref, watch, onBeforeUnmount } from 'vue'

const props = defineProps({
    open: {
        type: Boolean,
        default: false,
    },
    images: {
        type: Array,
        default: () => [],
    },
    currentIndex: {
        type: Number,
        default: 0,
    },
    alt: {
        type: String,
        default: '',
    },
})

const emit = defineEmits(['close', 'change'])

const activeIndex = ref(props.currentIndex)

watch(
    () => props.currentIndex,
    (val) => {
        activeIndex.value = val
    },
)

watch(
    () => props.open,
    (isOpen) => {
        if (typeof window === 'undefined') return
        document.body.classList.toggle('overflow-hidden', isOpen)
        if (isOpen) {
            activeIndex.value = props.currentIndex
            window.addEventListener('keydown', handleKeydown)
        } else {
            window.removeEventListener('keydown', handleKeydown)
        }
    },
    { immediate: true },
)

onBeforeUnmount(() => {
    if (typeof window !== 'undefined') {
        window.removeEventListener('keydown', handleKeydown)
        document.body.classList.remove('overflow-hidden')
    }
})

const normalizedImages = computed(() => {
    if (!props.images || props.images.length === 0) return []
    return props.images.map((img) => {
        if (typeof img === 'string') {
            return { url: img, alt: props.alt }
        }
        return { url: img.url || img.src || '', alt: img.alt || props.alt }
    })
})

const currentImage = computed(() => {
    if (normalizedImages.value.length === 0) return { url: '', alt: props.alt }
    const idx = Math.max(0, Math.min(activeIndex.value, normalizedImages.value.length - 1))
    return normalizedImages.value[idx]
})

const hasMultiple = computed(() => normalizedImages.value.length > 1)

const close = () => {
    emit('close')
}

const prev = () => {
    if (!hasMultiple.value) return
    activeIndex.value = (activeIndex.value - 1 + normalizedImages.value.length) % normalizedImages.value.length
    emit('change', activeIndex.value)
}

const next = () => {
    if (!hasMultiple.value) return
    activeIndex.value = (activeIndex.value + 1) % normalizedImages.value.length
    emit('change', activeIndex.value)
}

const handleKeydown = (e) => {
    if (!props.open) return
    if (e.key === 'Escape') close()
    if (e.key === 'ArrowLeft') prev()
    if (e.key === 'ArrowRight') next()
}
</script>

<template>
    <Teleport to="body">
        <Transition
            enter-active-class="transition duration-300 ease-out"
            enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="transition duration-200 ease-in"
            leave-from-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-95"
        >
            <div
                v-if="open && currentImage.url"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
                aria-modal="true"
                role="dialog"
            >
                <!-- Backdrop -->
                <div
                    class="absolute inset-0 bg-black/90 backdrop-blur-md transition-opacity"
                    @click="close"
                />

                <!-- Header / Controls -->
                <div class="absolute top-4 inset-x-4 sm:inset-x-8 z-20 flex items-center justify-between text-white">
                    <!-- Counter / Alt text -->
                    <div class="flex items-center gap-3 text-sm font-medium">
                        <span v-if="hasMultiple" class="rounded-full bg-white/10 px-3 py-1 text-xs backdrop-blur-sm">
                            {{ activeIndex + 1 }} / {{ normalizedImages.length }}
                        </span>
                        <span v-if="currentImage.alt" class="hidden sm:inline-block max-w-md truncate text-white/80">
                            {{ currentImage.alt }}
                        </span>
                    </div>

                    <!-- Close Button -->
                    <button
                        type="button"
                        class="rounded-full bg-white/10 p-2.5 text-white/90 hover:bg-white/20 hover:text-white transition-all focus:outline-none focus:ring-2 focus:ring-white/40 cursor-pointer"
                        aria-label="Close preview"
                        @click="close"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Navigation Previous Button -->
                <button
                    v-if="hasMultiple"
                    type="button"
                    class="absolute left-4 z-20 rounded-full bg-white/10 p-3 text-white/90 hover:bg-white/20 hover:text-white transition-all focus:outline-none cursor-pointer"
                    aria-label="Previous image"
                    @click.stop="prev"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Main Image Preview Container -->
                <div class="relative z-10 max-h-[85vh] max-w-[92vw] overflow-hidden flex items-center justify-center pointer-events-auto">
                    <img
                        :key="currentImage.url"
                        :src="currentImage.url"
                        :alt="currentImage.alt"
                        class="max-h-[85vh] max-w-[92vw] w-auto h-auto object-contain rounded-lg shadow-2xl transition-all duration-300 select-none"
                    />
                </div>

                <!-- Navigation Next Button -->
                <button
                    v-if="hasMultiple"
                    type="button"
                    class="absolute right-4 z-20 rounded-full bg-white/10 p-3 text-white/90 hover:bg-white/20 hover:text-white transition-all focus:outline-none cursor-pointer"
                    aria-label="Next image"
                    @click.stop="next"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </Transition>
    </Teleport>
</template>
