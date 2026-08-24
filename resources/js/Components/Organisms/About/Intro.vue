<script setup>
import CirclesBackground from '@/Components/Icons/CirclesBackground.vue'
import Subtitle from '@/Components/Atoms/Subtitle.vue'

defineProps({
    intro: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <section class="bg-slate-100 overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-[65fr_35fr] min-h-220">
            <!--             Content -->
            <div
                class="relative flex flex-col justify-center px-6 sm:px-8 md:px-12 lg:ps-24 lg:pe-12 xl:ps-32 xl:pe-16 max-w-5xl py-16 lg:py-0 z-10 overflow-hidden"
            >
                <!--                 Circles background -->
                <CirclesBackground />

                <!--                Text-->
                <div class="relative z-10">
                    <Subtitle>
                        {{ intro.title }}
                        <span class="text-primary-700" v-text="intro.highlight"></span>
                        {{ intro.subtitle }}
                    </Subtitle>

                    <template
                        v-for="(paragraph, index) in intro.paragraphs"
                        v-if="intro.paragraphs.length > 0"
                    >
                        <p
                            class="text-base sm:text-lg md:text-xl leading-[1.9] text-gray-600 mt-6 text-start"
                            v-text="paragraph"
                        ></p>
                    </template>

                    <h3 class="text-3xl mt-12 text-start font-script" v-text="intro.signature"></h3>
                </div>
            </div>

            <!--             Desktop Image -->
            <div class="relative hidden lg:block">
                <img
                    :src="'/assets/images/portrait-2.webp'"
                    alt="Portrait"
                    class="absolute inset-0 w-full h-full object-cover object-top"
                    style="filter: grayscale(15%) contrast(1.05)"
                />

                <!--                Decorative lines-->
                <img
                    :src="'/assets/svg/about.svg'"
                    alt=""
                    class="absolute bottom-4 inset-s-0 -translate-x-1/3 rtl:translate-x-1/3 w-90 lg:w-115 xl:w-130 opacity-80 pointer-events-none select-none rtl:scale-x-[-1]"
                />
            </div>
        </div>

        <!--         Mobile Image -->
        <div class="block lg:hidden w-full relative overflow-hidden">
            <div class="relative h-80 sm:h-95 md:h-105">
                <img
                    :src="'/assets/images/portrait-2.webp'"
                    alt="Portrait"
                    class="absolute inset-0 w-full h-full object-cover object-top"
                    style="filter: grayscale(15%) contrast(1.05)"
                />

                <!--                 Decorative lines (mobile) -->
                <img
                    :src="'/assets/svg/about.svg'"
                    alt=""
                    class="absolute bottom-0 inset-s-0 -translate-x-1/3 rtl:translate-x-1/3 w-65 sm:w-[320px] md:w-95 opacity-70 pointer-events-none rtl:scale-x-[-1]"
                />
            </div>
        </div>
    </section>
</template>
