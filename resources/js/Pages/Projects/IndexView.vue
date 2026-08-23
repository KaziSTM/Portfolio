<script setup>
import { Head, router } from '@inertiajs/vue3'

import AppLayout from '@/Components/Layouts/AppLayout.vue'
import Pagination from '@/Components/Atoms/Pagination.vue'
import ListProjectCard from '@/Components/Molecules/ListProjectCard.vue'
import Subtitle from '@/Components/Atoms/Subtitle.vue'
import useGetTitle from '@/Composables/useGetTitle.js'

defineProps({
    header: {
        type: Object,
        default: null,
    },
    projects: {
        type: Object,
        required: true,
    },
    filters: {
        type: Array,
        default: () => [],
    },
    selectedFilter: {
        type: String,
        default: '',
    },
    roles: {
        type: Array,
        default: () => [],
    },
    selectedRole: {
        type: String,
        default: '',
    },
    translations: {
        type: Object,
        required: true,
    },
})

const title = useGetTitle('work')

function setFilter(filter = null) {
    router.get(
        route('work'),
        {
            filter,
        },
        {
            preserveState: true,
            preserveScroll: true,
            replace: true,
        },
    )
}
</script>

<template>
    <Head :title="title" />

    <AppLayout>
        <section
            class="relative mx-auto max-w-6xl space-y-8 px-4 pb-24 pt-8 sm:px-6 sm:pb-28 sm:pt-10 md:space-y-16 lg:pb-32"
        >
            <!-- Header -->
            <div
                v-if="header"
                class="flex flex-col md:flex-row md:items-center justify-between gap-6 md:gap-12 w-full pt-8 sm:pt-10"
            >
                <Subtitle class="text-start mt-2 sm:mt-3">
                    {{ header.title }}
                </Subtitle>

                <p
                    class="text-lg lg:text-xl text-start text-gray-700 max-w-xl lg:max-w-2xl"
                    v-html="header.description"
                ></p>
            </div>
            <!-- Filters -->
            <div class="mt-10 flex flex-wrap justify-start gap-3">
                <button
                    :class="{
                        'bg-primary-700 text-white shadow-lg': !(selectedFilter || selectedRole),

                        'bg-secondary-100 text-secondary-600 hover:bg-secondary-200': (selectedFilter || selectedRole),
                    }"
                    class="rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"
                    @click="setFilter()"
                >
                    {{ translations.filters?.all ?? translations.projects.all }}
                </button>

                <button
                    v-for="item in (filters.length ? filters : roles)"
                    :key="item.value"
                    :class="{
                        'bg-primary-700 text-white shadow-lg': (selectedFilter || selectedRole) === item.value,

                        'bg-secondary-100 text-secondary-600 hover:bg-secondary-200':
                            (selectedFilter || selectedRole) !== item.value,
                    }"
                    class="rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"
                    @click="setFilter(item.value)"
                >
                    {{ item.label }}
                </button>
            </div>

            <!-- Projects -->
            <div
                class="grid grid-cols-1 items-start gap-x-6 gap-y-10 md:grid-cols-2 md:gap-x-10 md:gap-y-16 lg:gap-x-14 lg:gap-y-20"
            >
                <div
                    v-for="(project, index) in projects.data"
                    :key="project.id"
                    class="relative h-full overflow-hidden"
                >
                    <ListProjectCard
                        :project="project"
                        :reverse="index % 2 !== 0"
                        :translations="translations"
                    />
                </div>
            </div>

            <!-- Pagination -->
            <Pagination :links="projects.meta.links" :translations="translations.actions" />
        </section>
    </AppLayout>
</template>
