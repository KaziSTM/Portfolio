<script setup>

import AppLayout from "@/Components/Layouts/AppLayout.vue";
import {Head} from "@inertiajs/vue3";
import Hero from "@/Components/Organisms/Home/Hero.vue";
import Features from "@/Components/Organisms/Home/Features.vue";
</script>

<template>
    <Head title="Home"/>
    <AppLayout>
        <Hero/>
        <Features/>
    </AppLayout>
</template>

<style scoped>

</style>
