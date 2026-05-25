<script setup>
import {computed} from 'vue'
import {Link, usePage} from '@inertiajs/vue3'

import BaseButton from '@/Components/Atoms/BaseButton.vue'
import Subtitle from '@/Components/Atoms/Subtitle.vue'
import FooterContactArrow from "@/Components/Icons/FooterContactArrow.vue";

const page = usePage()

const footer = computed(() => page.props.cms.footer)
const socials = computed(() => page.props.cms.socials)
const navigation = computed(() => page.props.cms.footerNavigation)
</script>

<template>
    <footer class="bg-slate-900 py-10 sm:pt-16 lg:pt-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-12 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-32">
                <!-- Left -->
                <div class="space-y-16">
                    <Subtitle class="text-start text-white">
                        {{ footer.title }}
                    </Subtitle>

                    <div class="flex justify-start">
                        <Link
                            class="group relative inline-flex items-center gap-2 rounded-full border border-white/10 bg-white px-4 py-2 text-secondary-950 backdrop-blur-md transition-all duration-300"
                            href="/contact"
                        >
                            <span
                                class="pointer-events-none absolute left-1/2 top-1/2 h-12 w-28 -translate-x-1/2 -translate-y-1/2 scale-75 rounded-full bg-[radial-gradient(circle,rgba(2,129,199,0.45)_0%,transparent_70%)] opacity-0 blur-xl transition-all duration-300 group-hover:scale-100 group-hover:opacity-100"
                            />

                            <span class="relative z-10 font-medium">
                                {{ footer.button_label }}
                            </span>

                            <FooterContactArrow/>
                        </Link>
                    </div>
                </div>

                <!-- Right -->
                <div class="flex flex-col space-y-10">
                    <p class="mt-4 inline-flex pe-32 text-start text-secondary-100">
                        {{ footer.description }}
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <BaseButton
                            v-for="social in socials"
                            :key="social.name"
                            :href="social.link"
                            :icon="social.icon"
                            :label="social.name"
                            class="bg-transparent backdrop-blur-md border border-white/10 text-secondary-50 hover:bg-secondary-700"
                            external
                            position="right"
                            rounded
                        >
                            {{ social.name }}
                        </BaseButton>
                    </div>
                </div>
            </div>

            <hr class="mb-10 mt-16 border-secondary-200/10">

            <!-- Bottom -->
            <div class="flex flex-col gap-4 md:flex-row md:justify-between">
                <div class="flex w-full flex-wrap items-center gap-4">
                    <Link
                        v-for="link in navigation"
                        :key="link.route"
                        :href="link.route"
                        class="py-2 text-md font-light text-secondary-100 transition hover:text-white"
                    >
                        {{ link.label }}
                    </Link>
                </div>

                <p class="block w-full text-end text-sm text-secondary-300">
                    {{ footer.copyright }}
                </p>
            </div>
        </div>
    </footer>
</template>
