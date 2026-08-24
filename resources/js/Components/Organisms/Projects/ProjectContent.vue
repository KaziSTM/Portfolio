<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const props = defineProps({
    project: {
        type: Object,
        required: true,
    },
})

const page = usePage()

const translations = computed(() => {
    return page.props.translations.projects
})

const ctaTranslation = computed(() => {
    return page.props.translations.actions.visit_project
})

const companyHost = computed(() => {
    const website = props.project.company?.website

    if (!website) {
        return null
    }

    try {
        return new URL(website).hostname.replace(/^www\./, '')
    } catch {
        return website
    }
})
</script>

<template>
    <section class="mx-auto grid max-w-6xl grid-cols-1 gap-10 md:gap-16 px-4 sm:px-6 py-10 sm:py-16 md:py-24 md:grid-cols-3">
        <!-- META -->
        <aside class="grid grid-cols-2 sm:grid-cols-3 md:block gap-6 md:space-y-8 text-sm text-gray-600 min-w-0">
            <!-- Client -->
            <div>
                <p class="mb-1 font-medium text-gray-900" v-text="translations.client"></p>

                <p v-text="project.company?.name ?? translations.personal_project"></p>
            </div>

            <!-- Industry -->
            <div v-if="project.company?.industry">
                <p class="mb-1 font-medium text-gray-900" v-text="translations.industry"></p>
                <p v-text="project.company.industry"></p>
            </div>

            <!-- Company Size -->
            <div v-if="project.company?.size">
                <p class="mb-1 font-medium text-gray-900" v-text="translations.company_size"></p>
                <p v-text="project.company.size"></p>
            </div>

            <!-- Headquarters -->
            <div v-if="project.company?.headquarter">
                <p class="mb-1 font-medium text-gray-900" v-text="translations.headquarters"></p>
                <p v-text="project.company.headquarter"></p>
            </div>

            <!-- Duration -->
            <div v-if="project.start || project.end || (!project.end && project.is_in_progress)">
                <p class="mb-1 font-medium text-gray-900" v-text="translations.duration"></p>

                <p>
                    <template v-if="project.start">
                        {{ project.start }}
                        <template v-if="project.end"> — {{ project.end }} </template>

                        <template v-else-if="!project.end && project.is_in_progress">
                            — {{ translations.ongoing ?? translations.in_progress }}
                        </template>
                    </template>

                    <template v-else-if="!project.end && project.is_in_progress">
                        {{ translations.ongoing ?? translations.in_progress }}
                    </template>
                </p>
            </div>

            <!-- Website -->
            <div v-if="companyHost">
                <p class="mb-1 font-medium text-gray-900" v-text="translations.website"></p>
                <a
                    :href="project.company.website"
                    class="text-gray-700 hover:underline break-all"
                    rel="noopener noreferrer"
                    target="_blank"
                    v-text="companyHost"
                ></a>
            </div>

            <!-- Visit Project -->
            <div v-if="project.link" class="col-span-full md:col-span-1 pt-2 md:pt-0">
                <a
                    :href="project.link"
                    class="inline-flex items-center rounded-full bg-gray-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-gray-800"
                    rel="noopener noreferrer"
                    target="_blank"
                >
                    {{ ctaTranslation }}
                    <svg class="ms-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M7 17L17 7M17 7H8M17 7V16"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                    </svg>
                </a>
            </div>
        </aside>

        <!-- CONTENT -->
        <div class="space-y-6 sm:space-y-10 text-gray-700 md:col-span-2 min-w-0">
            <div
                class="text-lg sm:text-xl font-medium leading-relaxed text-gray-900 break-words [overflow-wrap:anywhere]"
                v-html="project.description"
            />

            <div class="prose prose-base sm:prose-lg max-w-none prose-gray min-w-0 break-words [overflow-wrap:anywhere]" v-html="project.details" />
        </div>
    </section>
</template>
