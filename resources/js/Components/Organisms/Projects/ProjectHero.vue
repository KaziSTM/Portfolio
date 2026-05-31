<script setup>
defineProps({
    project: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <section class="mx-auto max-w-6xl px-6 pb-20 pt-28">
        <!-- Type & Roles -->
        <div class="mb-8 flex flex-wrap items-center gap-3">
            <span
                class="rounded-full bg-primary-500/10 px-4 py-2 text-sm font-medium text-primary-700 ring-1 ring-primary-500/20"
                v-text="project.type_label"></span>

            <span v-for="role in project.role_labels"
                :key="role"
                class="rounded-full bg-white px-4 py-2 text-sm text-gray-700 ring-1 ring-gray-200 transition hover:bg-gray-50"
                v-text="role"></span>
        </div>

        <!-- Tech Tags -->
        <div v-if="project.tech_tags?.length" class="mb-8 flex flex-wrap gap-3">
            <span v-for="tag in project.tech_tags"
                :key="tag"
                class="rounded-full bg-gray-200 px-4 py-2 text-sm text-gray-700"
                v-text="tag"></span>
        </div>

        <!-- Title -->
        <h1 class="max-w-5xl text-4xl font-semibold tracking-tight text-gray-900 md:text-6xl" v-text="project.header"></h1>
    </section>
</template>
