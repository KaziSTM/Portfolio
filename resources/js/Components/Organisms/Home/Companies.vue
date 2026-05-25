<script setup>
import {computed, ref} from 'vue'
import {usePage} from '@inertiajs/vue3'

const page = usePage()

const content = computed(() => {
    return page.props.cms.companies_section.content
})

const companies = computed(() => {
    return page.props.cms.companies_section.companies
})

const hoveredCompany = ref(null)
</script>

<template>
    <section
        class="mb-16 mt-12 bg-slate-100 p-4 sm:p-6 lg:p-8"
    >
        <div
            class="container mx-auto text-center lg:text-start"
        >
            <!-- Header -->
            <div
                class="relative flex items-start justify-center lg:justify-start"
            >
                <h3
                    class="max-w-xs text-2xl font-semibold leading-snug sm:max-w-sm sm:text-3xl lg:max-w-md lg:text-4xl"
                >
                    {{ content.title }}

                    <span class="text-primary-500">
                        {{ content.highlight }}
                    </span>

                    {{ content.suffix }}
                </h3>

                <img
                    :src="'/assets/svg/companies.svg'"
                    alt=""
                    class="h-12 w-12 shrink-0 rtl:hidden sm:h-16 sm:w-16 lg:h-20 lg:w-20"
                >

                <img
                    :src="'/assets/svg/companies-right.svg'"
                    alt=""
                    class="h-12 w-12 shrink-0 ltr:hidden sm:h-16 sm:w-16 lg:h-20 lg:w-20"
                >
            </div>

            <!-- Grid -->
            <div
                class="grid grid-cols-2 gap-2 px-0 py-6 sm:grid-cols-3 sm:gap-3 sm:px-4 sm:py-8 md:grid-cols-4 lg:grid-cols-5 lg:px-8 lg:py-10 xl:py-14"
            >
                <a
                    v-for="company in companies"
                    :key="company.id"
                    :href="company.website"
                    class="flex flex-col items-center justify-center gap-2 rounded-xl border px-3 py-3 transition-colors duration-200 hover:cursor-pointer hover:bg-white sm:flex-row sm:px-4 sm:py-4 lg:px-6"
                    rel="noopener noreferrer"
                    target="_blank"
                    @mouseenter="hoveredCompany = company.id"
                    @mouseleave="hoveredCompany = null"
                >
                    <img
                        :alt="company.name"
                        :class="{
                            'scale-110': hoveredCompany === company.id,
                        }"
                        :src="company.logo_url"
                        class="h-7 w-7 object-contain transition-transform duration-200 sm:h-9 sm:w-9 lg:h-10 lg:w-10"
                    >

                    <h2
                        class="text-center text-xs font-semibold leading-tight text-black sm:text-sm lg:text-base"
                    >
                        {{ company.name }}
                    </h2>
                </a>
            </div>
        </div>
    </section>
</template>
