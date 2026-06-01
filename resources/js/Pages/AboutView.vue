<script setup>
import AppLayout from '@/Components/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import useGetTitle from '@/Composables/useGetTitle.js'
import Intro from '@/Components/Organisms/About/Intro.vue'
import Careers from '@/Components/Organisms/About/Careers.vue'
import Stack from '@/Components/Organisms/About/Stack.vue'

const title = useGetTitle('about')
</script>

<template>
    <Head :title="title" />
    <AppLayout>
        <Intro />
        <Careers />
        <Stack />
    </AppLayout>
</template>
