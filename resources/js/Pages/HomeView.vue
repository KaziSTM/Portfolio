<script setup>

import AppLayout from "@/Components/Layouts/AppLayout.vue";
import {Head} from "@inertiajs/vue3";
import Hero from "@/Components/Organisms/Home/Hero.vue";
import Features from "@/Components/Organisms/Home/Features.vue";
import Tools from "@/Components/Organisms/Home/Tools.vue";
import LatestWork from "@/Components/Organisms/Home/LatestWork.vue";
import Companies from "@/Components/Organisms/Home/Companies.vue";
</script>

<template>
    <Head title="Home"/>
    <AppLayout>
        <Hero/>
        <Features/>
        <Tools/>
        <LatestWork/>
        <Companies/>
    </AppLayout>
</template>

<style scoped>

</style>
