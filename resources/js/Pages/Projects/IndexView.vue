<script setup>
import { Head, router } from '@inertiajs/vue3'

import AppLayout from '@/Components/Layouts/AppLayout.vue'
import Pagination from '@/Components/Atoms/Pagination.vue'
import ListProjectCard from '@/Components/Molecules/ListProjectCard.vue'
import useGetTitle from '@/Composables/useGetTitle.js'

defineProps({
    projects: {
        type: Object,
        required: true,
    },
    roles: {
        type: Object,
        required: true,
    },
    selectedRole: {
        type: String,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const title = useGetTitle('work')

function setRole(role = null) {
    router.get(
        route('work'),
        {
            role,
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
            <!-- Filters -->
            <div class="mt-10 flex flex-wrap justify-center gap-3">
                <button
                    :class="{
                        'bg-primary-700 text-white shadow-lg': !selectedRole,

                        'bg-secondary-100 text-secondary-600 hover:bg-secondary-200': selectedRole,
                    }"
                    class="rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"
                    @click="setRole()"
                >
                    {{ translations.projects.all }}
                </button>

                <button
                    v-for="role in roles"
                    :key="role.value"
                    :class="{
                        'bg-primary-700 text-white shadow-lg': selectedRole === role.value,

                        'bg-secondary-100 text-secondary-600 hover:bg-secondary-200':
                            selectedRole !== role.value,
                    }"
                    class="rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"
                    @click="setRole(role.value)"
                >
                    {{ role.label }}
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
