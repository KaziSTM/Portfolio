<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

import BaseButton from '@/Components/Atoms/BaseButton.vue'
import SpecularButton from '@/Components/Atoms/SpecularButton.vue'
import Subtitle from '@/Components/Atoms/Subtitle.vue'

const page = usePage()

const footer = computed(() => page.props.footer)
const socials = computed(() => page.props.socials)
const navigation = computed(() => page.props.footerNavigation)
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
                        <a href="/contact">
                            <SpecularButton
                                :auto-animate="false"
                                :blur="0"
                                :intensity="1.5"
                                :proximity="280"
                                :radius="14"
                                :shine-fade="38"
                                :shine-size="12"
                                :speed="0.35"
                                :thickness="1"
                                :tint-opacity="1"
                                base-color="#0c635a"
                                follow-mouse
                                line-color="#21e0c0"
                                size="md"
                                text-color="#030712"
                                tint="#ffffff"
                            >
                                <span class="relative font-medium">
                                    {{ footer.button_label }}
                                </span>
                            </SpecularButton>
                        </a>
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

            <hr class="mb-10 mt-16 border-secondary-200/10" />

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
