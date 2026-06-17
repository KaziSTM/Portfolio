<script setup>
import AppLayout from '@/Components/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import Hero from '@/Components/Organisms/Home/Hero.vue'
import useGetTitle from '@/Composables/useGetTitle.js'
import { defineAsyncComponent } from 'vue'

// Synchronous load for above-the-fold (Hero)
// Async load for below-the-fold (Everything else)
const Features = defineAsyncComponent(() => import('@/Components/Organisms/Home/Features.vue'))
const Tools = defineAsyncComponent(() => import('@/Components/Organisms/Home/Tools.vue'))
const LatestWork = defineAsyncComponent(() => import('@/Components/Organisms/Home/LatestWork.vue'))
const Companies = defineAsyncComponent(() => import('@/Components/Organisms/Home/Companies.vue'))

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
