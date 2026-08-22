<script setup>
import { computed } from 'vue'
import LogoLoop from '@/Components/Atoms/LogoLoop.vue'

const props = defineProps({
    companiesSection: {
        type: Object,
        required: true,
    },
})

// Map companies data into LogoLoop's LogoItem[] format.
// We duplicate the list several times so that with a small number of
// logos the marquee looks dense and the loop-around is not obvious.
const LOGO_REPEAT = 6
const companyLogos = computed(() => {
    const mapped = props.companiesSection.companies.data.map((company) => ({
        src: company.logo,
        alt: company.name,
        href: company.website,
        title: company.name,
        height: 28,
        width: 28,
    }))
    return Array.from({ length: LOGO_REPEAT }, () => mapped).flat()
})
</script>

<template>
    <section class="mb-16 mt-12 bg-slate-100 p-4 pb-6 sm:p-6 sm:pb-8 lg:p-8 lg:pb-10">
        <div class="container mx-auto text-center lg:text-start">
            <!-- Header -->
            <div class="relative flex items-start justify-center lg:justify-start">
                <h3
                    class="max-w-xs text-2xl font-semibold leading-snug sm:max-w-sm sm:text-3xl lg:max-w-md lg:text-4xl"
                >
                    {{ companiesSection.content.title }}

                    <span class="text-primary-700">
                        {{ companiesSection.content.highlight }}
                    </span>

                    {{ companiesSection.content.suffix }}
                </h3>

                <img
                    :src="'/assets/svg/companies.svg'"
                    alt=""
                    class="h-12 w-12 shrink-0 rtl:hidden sm:h-16 sm:w-16 lg:h-20 lg:w-20"
                />

                <img
                    :src="'/assets/svg/companies-right.svg'"
                    alt=""
                    class="h-12 w-12 shrink-0 ltr:hidden sm:h-16 sm:w-16 lg:h-20 lg:w-20"
                />
            </div>

            <!-- Logo Loop -->
            <div class="mt-8 mb-2 sm:mt-10 sm:mb-4 lg:mt-12 lg:mb-6">
                <LogoLoop
                    :logos="companyLogos"
                    :speed="40"
                    direction="left"
                    :logo-height="28"
                    :gap="64"
                    :hover-speed="15"
                    :fade-out="true"
                    fade-out-color="#f1f5f9"
                    :scale-on-hover="true"
                    aria-label="Companies I've worked with"
                />
            </div>
        </div>
    </section>
</template>
