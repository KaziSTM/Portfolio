<script setup>
import Subtitle from '@/Components/Atoms/Subtitle.vue'
import DownloadSimple from '@/Components/Icons/DownloadSimple.vue'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

defineProps({
    careers: {
        type: Object,
        required: true,
    },
})

const page = usePage()

const local = computed(() => page.props.locale)

const resume =
    local.value === 'fr' ? '/assets/docs/Youcef_Nezrek_fr.pdf' : '/assets/docs/Youcef_Nezrek_en.pdf'
</script>

<template>
    <section class="container mx-auto text-start mt-16 md:mt-0">
        <div class="grid grid-cols-1 lg:grid-cols-5 xl:gap-12">
            <!--            Left / Start column -->
            <div class="col-span-2 px-6 sm:px-8 md:px-12 lg:px-0 lg:ps-32 xl:ps-48 py-4 lg:py-32">
                <Subtitle v-text="careers.content.title" />

                <p
                    class="mt-6 text-lg lg:text-xl text-gray-700"
                    v-text="careers.content.description"
                ></p>

                <a
                    :href="resume"
                    class="flex gap-2 items-center w-1/2 min-w-max bg-slate-100 mt-6 py-2 px-6 border rounded-2xl focus:outline-none hover:bg-slate-200 transition-colors"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <span
                        class="capitalize font-semibold text-secondary-900"
                        v-text="careers.download_label"
                    ></span>
                    <DownloadSimple
                        class="h-5 w-5 transform transition-transform duration-300 group-hover:-translate-y-0.5"
                        name="download-simple"
                    />
                </a>
            </div>

            <!--            Right / End column -->
            <ol
                class="col-span-3 px-6 sm:px-8 md:px-12 lg:px-0 py-4 lg:py-32 lg:pe-28 xl:pe-36 grid grid-cols-1 md:grid-cols-2 gap-6"
            >
                <template
                    v-for="(job, index) in careers.jobs.data"
                    v-if="careers.jobs.data.length > 0"
                    :key="job.id"
                >
                    <div class="relative px-0 py-4 sm:p-4 rounded-lg">
                        <div class="flex flex-col mb-2 space-y-6">
                            <div
                                class="p-2 rounded-lg border border-slate-200 bg-slate-100 max-w-fit"
                            >
                                <img
                                    :alt="job.company.name + '-logo'"
                                    :src="job.company.logo"
                                    class="w-6 h-6"
                                />
                            </div>
                            <span
                                class="font-semibold text-sm leading-5 text-primary-700"
                                v-text="job.duration"
                            ></span>
                            <span
                                class="absolute text-[6rem] font-bold font-mono text-slate-100 inset-e-1 -top-8"
                            >
                                {{ String(index + 1).padStart(2, '0') }}
                            </span>
                        </div>
                        <h2 class="text-xl font-bold capitalize" v-text="job.company.name"></h2>
                        <p
                            class="mt-6 text-base text-gray-700 leading-relaxed"
                            v-html="job.description"
                        ></p>
                    </div>
                </template>
            </ol>
        </div>
    </section>
</template>
