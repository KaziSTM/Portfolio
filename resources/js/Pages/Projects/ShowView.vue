<script setup>
import { Head } from '@inertiajs/vue3'

import AppLayout from '@/Components/Layouts/AppLayout.vue'
import useGetTitle from '@/Composables/useGetTitle'
import Testimonials from '@/Components/Organisms/Projects/Testimonials.vue'
import ProjectHero from '@/Components/Organisms/Projects/ProjectHero.vue'
import ProjectContent from '@/Components/Organisms/Projects/ProjectContent.vue'

defineProps({
    project: {
        type: Object,
        required: true,
    },
})

const title = useGetTitle('project')
</script>

<template>
    <Head :title="title" />

    <AppLayout>
        <!-- HERO -->
        <ProjectHero :project="project.data" />

        <!-- HERO IMAGE -->
        <section v-if="project.data.main_url" class="w-full">
            <img
                :alt="project.data.header"
                :src="project.data.main_url"
                class="w-full h-auto max-h-[85vh] object-cover"
            />
        </section>

        <!-- CONTENT -->
        <ProjectContent :project="project.data" />

        <!-- GALLERY -->
        <section
            v-if="project.data.gallery?.length"
            class="mx-auto grid max-w-7xl gap-8 px-6 pb-24 md:grid-cols-2"
        >
            <img
                v-for="image in project.data.gallery"
                :key="image.url"
                :alt="project.data.header"
                :src="image.url"
                class="w-full rounded-lg"
            />
        </section>

        <!-- TESTIMONIALS -->
        <Testimonials
            v-if="project.data.testimonials?.length"
            :testimonials="project.data.testimonials"
        />
    </AppLayout>
</template>
