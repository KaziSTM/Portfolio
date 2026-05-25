<script setup>

import {ref} from "vue";
import Modal from "../Molecules/Modal.vue";
import Navbar from "./Navbar.vue";

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

        <!-- Burger button-->
        <div class="absolute z-99 -top-6 inset-e-1">
            <button
                class="flex flex-col rotate-45 w-full px-5 py-4 font-semibold text-start select-none focus:border-none focus:ring-0"
                @click="modalOpen=!modalOpen">

                <transition name="ease-in-out-transition"
                >

                    <div :class="modalOpen ? 'opacity-100 scale-150' : 'rotate-45'"
                         class="relative flex items-center justify-center transition-all w-4 h-4 duration-300 ease-out">
                        <div class="absolute w-0.5 h-3/5 bg-neutral-900 group-hover:bg-neutral-800 rounded-full"></div>
                        <div :class="{ 'rotate-90': !modalOpen }"
                             class="absolute w-7/12 h-0.5 ease duration-900 bg-neutral-900 group-hover:bg-neutral-800 rounded-full">
                        </div>
                    </div>
                </transition>

                <div v-show="!modalOpen" :class="{ 'rotate-45': !modalOpen }"
                     class="relative flex w-4 h-4 duration-300 ease-out">
                    <div
                        class="absolute w-0.5 h-3/5 bottom-[14.5px] bg-neutral-900 group-hover:bg-neutral-800 rounded-full"></div>
                    <div :class="{ 'rotate-90': !modalOpen }"
                         class="absolute w-7/12 h-0.5 inset-s-[1.5px] -top-[4.5px] ease duration-900 bg-neutral-900 group-hover:bg-neutral-800 rounded-full">
                    </div>
                </div>

            </button>
        </div>

        <!--        Modal-->
        <Modal :modalOpen="modalOpen" @close="modalOpen = false">
            <Navbar :navigation="navigation" class="flex flex-col pb-2"/>
        </Modal>
    </div>
</template>

