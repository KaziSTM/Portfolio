<script setup>

import {ref} from "vue";
import Modal from "@/Components/Molecules/Modal.vue";
import Navbar from "@/Components/Organisms/Navbar.vue";

defineProps({
    navigation: {
        type: Object,
        required: true,
    }
})

let modalOpen = ref(false);
</script>

<template>
    <div class="relative z-50 flex h-auto w-auto xl:hidden">
        <div class="absolute z-99 -top-6 inset-e-1">
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

        <Modal :modalOpen="modalOpen" @close="modalOpen = false">
            <Navbar :navigation="navigation" class="flex flex-col pb-2"/>
        </Modal>
    </div>
</template>
