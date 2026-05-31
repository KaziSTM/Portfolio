<script setup>
import { computed } from 'vue'
import { Head, usePage } from '@inertiajs/vue3'

import AppLayout from '@/Components/Layouts/AppLayout.vue'
import useGetTitle from '@/Composables/useGetTitle'
import Testimonials from '@/Components/Organisms/Projects/Testimonials.vue'
import ProjectHero from '@/Components/Organisms/Projects/ProjectHero.vue'
import ProjectContent from '@/Components/Organisms/Projects/ProjectContent.vue'

const page = usePage()

const project = computed(() => page.props.project)

const title = useGetTitle('project')
</script>

<template>
    <Head :title="title" />

    <AppLayout>
        <!-- HERO -->
        <ProjectHero :project="project" />

        <!-- HERO IMAGE -->
        <section v-if="project.logo_url" class="mx-auto max-w-7xl">
            <img
                :alt="project.header"
                :src="project.logo_url"
                class="w-full rounded-xl object-cover"
            />
        </section>

        <!-- CONTENT -->
        <ProjectContent :project="project" />

        <!-- GALLERY -->
        <section
            v-if="project.gallery?.length"
            class="mx-auto grid max-w-7xl gap-8 px-6 pb-24 md:grid-cols-2"
        >
            <img
                v-for="image in project.gallery"
                :key="image.url"
                :alt="project.header"
                :src="image.url"
                class="w-full rounded-lg"
            />
        </section>

        <!-- TESTIMONIALS -->
        <Testimonials v-if="project.testimonials?.length" :testimonials="project.testimonials" />
    </AppLayout>
</template>
