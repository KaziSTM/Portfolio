<script setup>
import AppLayout from '@/Components/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import Hero from '@/Components/Organisms/Home/Hero.vue'
import Features from '@/Components/Organisms/Home/Features.vue'
import Tools from '@/Components/Organisms/Home/Tools.vue'
import LatestWork from '@/Components/Organisms/Home/LatestWork.vue'
import Companies from '@/Components/Organisms/Home/Companies.vue'
import useGetTitle from '@/Composables/useGetTitle.js'

const title = useGetTitle('home')
</script>

<template>
    <Head :title="title" />
    <AppLayout>
        <Hero />
        <Features />
        <Tools />
        <LatestWork />
        <Companies />
    </AppLayout>
</template>

<style scoped></style>
