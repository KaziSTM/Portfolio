<script setup>
import { computed, ref, watch } from 'vue'

const props = defineProps({
    items: {
        type: Array,
        required: true,
    },

    showControls: {
        type: Boolean,
        default: true,
    },

    showIndicators: {
        type: Boolean,
        default: true,
    },
})

const current = ref(0)

const total = computed(() => props.items.length)

const hasItems = computed(() => total.value > 0)

const hasMultiple = computed(() => total.value > 1)

function next() {
    if (!hasMultiple.value) {
        return
    }

    current.value = (current.value + 1) % total.value
}

function prev() {
    if (!hasMultiple.value) {
        return
    }

    current.value = (current.value - 1 + total.value) % total.value
}

function goTo(index) {
    current.value = index
}

watch(
    total,
    (value) => {
        if (current.value >= value) {
            current.value = Math.max(0, value - 1)
        }
    },
    { immediate: true },
)
</script>

<template>
    <div
        v-if="hasItems"
        class="relative my-20"
        tabindex="0"
        @keydown.left.prevent="prev"
        @keydown.right.prevent="next"
    >
        <Transition
            enter-active-class="transition duration-300"
            enter-from-class="opacity-0 translate-y-2"
            leave-active-class="transition duration-300"
            leave-to-class="opacity-0 -translate-y-2"
            mode="out-in"
        >
            <div :key="current">
                <slot
                    :current="current"
                    :index="current"
                    :item="items[current]"
                    :total="total"
                    name="slide"
                />
            </div>
        </Transition>

        <div v-if="showControls && hasMultiple" class="mt-8 flex items-center justify-center gap-6">
            <button type="button" @click="prev">
                <slot name="prev"> Prev </slot>
            </button>

            <button type="button" @click="next">
                <slot name="next"> Next </slot>
            </button>
        </div>

        <div v-if="showIndicators && hasMultiple" class="mt-4 flex justify-center gap-2">
            <button
                v-for="(_, index) in items"
                :key="index"
                :class="current === index ? 'bg-gray-900' : 'bg-gray-300'"
                class="h-2.5 w-2.5 rounded-full transition"
                type="button"
                @click="goTo(index)"
            />
        </div>
    </div>
</template>
