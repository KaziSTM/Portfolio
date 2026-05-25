<script setup>
import {computed} from 'vue'

import {useModal} from '@/Composables/useModal.js'

const props = defineProps({
    modalOpen: Boolean,
})

const emit = defineEmits([
    'close',
])

const close = () => {
    emit('close')
}

useModal(
    computed(() => props.modalOpen),
    close,
)
</script>

<template>
    <teleport to="body">
        <transition name="fade">
            <div
                v-if="modalOpen"
                class="fixed inset-0 z-50 flex items-start justify-center"
            >
                <div
                    class="absolute inset-0 bg-black/40"
                    @click="close"
                />

                <transition name="modal">
                    <div
                        class="relative z-10 mt-20 w-10/12 rounded-xl bg-white px-7 py-6 shadow-md shadow-primary-50"
                        @click.stop
                    >
                        <slot/>
                    </div>
                </transition>
            </div>
        </transition>
    </teleport>
</template>
