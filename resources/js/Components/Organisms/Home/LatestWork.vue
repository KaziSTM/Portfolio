<script setup>
import Section from '@/Components/Atoms/Section.vue'
import Subtitle from '@/Components/Atoms/Subtitle.vue'
import ProjectCard from '@/Components/Molecules/ProjectCard.vue'

defineProps({
    latestWorkSection: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <div>
        <Section class="mt-16">
            <div class="container mx-auto space-y-20 text-center lg:text-left">
                <!-- Header -->
                <div class="flex flex-col items-center">
                    <Subtitle class="leading-loose" v-html="latestWorkSection.content.title" />

                    <div class="wrap-break-word px-2 text-center md:px-20 lg:px-48 xl:px-96">
                        <p
                            class="mt-6 text-lg text-gray-700 lg:text-xl"
                            v-html="latestWorkSection.content.description"
                        />
                    </div>
                </div>

                <!-- Projects -->
                <div class="mt-20 grid justify-center gap-10 px-4 sm:px-10 lg:px-16">
                    <ProjectCard
                        v-for="project in latestWorkSection.latest_projects.data"
                        :key="project.id"
                        :project="project"
                        :translations="latestWorkSection.translations"
                    />
                </div>
            </div>
        </Section>
    </div>
</template>
