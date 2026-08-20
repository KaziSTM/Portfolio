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

defineProps({
    heroSection: {
        type: Object,
        required: true,
    },
    featuresSection: {
        type: Object,
        required: true,
    },
    toolsSectionCaption: {
        type: String,
        required: true,
    },
    latestWorkSection: {
        type: Object,
        required: true,
    },
    companiesSection: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <Head :title="title" />
    <AppLayout>
        <Hero :heroSection="heroSection" />
        <Features :featuresSection="featuresSection" />
        <Tools :toolsSectionCaption="toolsSectionCaption" />
        <LatestWork :latestWorkSection="latestWorkSection" />
        <Companies :companiesSection="companiesSection" />
    </AppLayout>
</template>
