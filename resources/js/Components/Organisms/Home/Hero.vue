<script setup>
import { usePage, Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import Section from '@/Components/Atoms/Section.vue'
import Title from '@/Components/Atoms/Title.vue'
import BaseButton from '@/Components/Atoms/BaseButton.vue'
import SpecularButton from '@/Components/Atoms/SpecularButton.vue'
import Underline from '@/Components/Icons/Underline.vue'
import HeroArrow from '../../Icons/HeroArrow.vue'

const page = usePage()

defineProps({
    heroSection: {
        type: Object,
        required: true,
    },
})

const socials = computed(() => page.props.socials)
const contactUrl = computed(() => route('contact', { locale: page.props.locale }))
</script>

<template>
    <div class="relative" dir="auto">
        <img
            :src="'/assets/svg/home-hero-gradient.svg'"
            alt="hero gradient"
            aria-hidden="true"
            class="absolute top-0 inset-s-0 w-full h-auto rtl:right-0 rtl:-rotate-180"
            decoding="async"
            fetchpriority="high"
            height="894"
            loading="eager"
            width="1728"
        />

        <Section>
            <div class="container mx-auto text-center lg:text-start">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 xl:gap-24 items-center px-4 sm:px-8 md:px-12 lg:px-16"
                >
                    <div class="">
                        <Title>
                            <div class="relative text-primary-400 inline-flex mb-2">
                                <Underline
                                    class="absolute w-2/5 inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10"
                                />
                                <span class="relative z-20 flex gap-2 text-black">
                                    <span v-text="heroSection.content.kicker"></span>
                                </span>
                            </div>
                            {{ heroSection.content.title }}
                        </Title>

                        <p
                            class="mt-6 text-lg lg:text-xl text-gray-700"
                            v-html="heroSection.content.description"
                        ></p>

                        <div
                            class="mt-8 flex flex-col sm:flex-row items-center sm:justify-center lg:justify-start gap-4"
                        >
                            <Link :href="contactUrl">
                                <SpecularButton
                                    size="md"
                                    :radius="14"
                                    tint="#030712"
                                    :tint-opacity="1"
                                    :blur="0"
                                    text-color="#f3f4f6"
                                    line-color="#21e0c0"
                                    base-color="#0c635a"
                                    :intensity="1.5"
                                    :shine-size="12"
                                    :shine-fade="38"
                                    :thickness="1"
                                    :speed="0.35"
                                    follow-mouse
                                    :proximity="280"
                                    :auto-animate="false"
                                >
                                    <span
                                        class="capitalize font-semibold"
                                        v-text="heroSection.hero_cta_label"
                                    />
                                </SpecularButton>
                            </Link>

                            <div class="flex justify-center items-center gap-4">
                                <BaseButton
                                    v-for="social in socials"
                                    :key="social.name"
                                    :href="social.link"
                                    :icon="social.icon"
                                    :label="social.name"
                                    circle
                                    color="secondary"
                                    external
                                    outline
                                />
                            </div>
                        </div>
                    </div>

                    <div class="relative flex justify-center mb-12 lg:mb-0">
                        <div
                            class="hidden lg:block absolute -top-12 inset-s-auto inset-e-auto -translate-x-6 rtl:translate-x-10"
                        >
                            <p
                                class="text-3xl -rotate-10 font-hand"
                                v-text="heroSection.content.intro"
                            ></p>
                            <HeroArrow />
                        </div>

                        <img
                            :src="'/assets/images/portrait-2.webp'"
                            alt="Youcef Nezrek"
                            class="h-auto w-full max-w-105 rounded-xl object-cover shadow-xl md:max-w-120 lg:max-w-lg"
                            decoding="async"
                            fetchpriority="high"
                            height="1280"
                            loading="eager"
                            sizes="(min-width: 1024px) 512px, (min-width: 768px) 480px, calc(100vw - 2rem)"
                            width="853"
                        />
                    </div>
                </div>
            </div>
        </Section>
    </div>
</template>
