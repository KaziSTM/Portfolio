<script setup>

import Underline from "@/Components/Icons/Underline.vue";

defineProps({
    text: {
        type: String,
        required: true
    }
})
</script>

<template>
    <div class="relative text-primary-400 inline-flex mb-2 ">
        <Underline class="absolute inset-x-0 bottom-0 translate-y-2 md:translate-y-3 z-10"/>
        <h1 class="relative z-20 text-primary-500 flex space-x-2">
            <span v-text="text"></span>
        </h1>
    </div>

</template>


