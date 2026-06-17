<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

import Section from '@/Components/Atoms/Section.vue'
import Subtitle from '@/Components/Atoms/Subtitle.vue'
import ProjectCard from '@/Components/Molecules/ProjectCard.vue'

const page = usePage()

const content = computed(() => {
    return page.props.cms.work_section.content
})

const projects = computed(() => {
    return page.props.cms.work_section.latest_projects
})
</script>

<template>
    <div>
        <Section class="mt-16">
            <div class="container mx-auto space-y-20 text-center lg:text-left">
                <!-- Header -->
                <div class="flex flex-col items-center">
                    <Subtitle class="leading-loose" v-html="content.title" />

                    <div class="wrap-break-word px-2 text-center md:px-20 lg:px-48 xl:px-96">
                        <p
                            class="mt-6 text-lg text-gray-700 lg:text-xl"
                            v-html="content.description"
                        />
                    </div>
                </div>

                <!-- Projects -->
                <div class="mt-20 grid justify-center gap-10 px-10 sm:px-16">
                    <ProjectCard v-for="project in projects" :key="project.id" :project="project" />
                </div>
            </div>
        </Section>
    </div>
</template>
