<script setup>
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import DownloadSimple from "@/Components/Icons/DownloadSimple.vue";
import Section from "@/Components/Atoms/Section.vue";
import Subtitle from "@/Components/Atoms/Subtitle.vue";
import FeatureArrow from "@/Components/Icons/FeatureArrow.vue";
import CheckCircle from "@/Components/Icons/CheckCircle.vue";
import RectangleStack from "@/Components/Icons/RectangleStack.vue";
import CodeBracket from "@/Components/Icons/CodeBracket.vue";

const page = usePage()

const featuresContent = computed(() => page.props.cms.features_section.features)
const translations = computed(() => page.props.cms.features_section.translations)

const iconMap = {
    'heroicon-o-check-circle': CheckCircle,
    'heroicon-o-rectangle-stack': RectangleStack,
    'heroicon-o-code-bracket': CodeBracket,
}

console.log(featuresContent)

</script>

<template>

    <div>
        <Section class="bg-slate-100">
            <div class="container mx-auto text-center lg:text-start space-y-20">

                <!--                Header-->
                <div
                    class="grid grid-cols-1 xl:grid-cols-2 gap-10 md:gap-16 xl:gap-24 items-center px-4 sm:px-8 md:px-12 lg:px-16">
                    <Subtitle>
                        {{ featuresContent.title }}
                    </Subtitle>

                    <p class="mt-6 text-lg lg:text-xl text-start text-gray-700"
                       v-html="featuresContent.description"></p>
                </div>

                <!--                Content-->
                <div
                    class="flex flex-col lg:flex-row gap-12 lg:gap-16 xl:gap-20 items-center px-4 sm:px-8 md:px-12 lg:px-16">

                    <!--                    Features-->
                    <div class="relative grid gap-10 md:gap-14 lg:gap-20 grid-cols-1">
                        <div v-for="(feature,index ) in featuresContent.items" class="flex items-start gap-6">
                            <div
                                class="relative min-w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center">

                                <component
                                    :is="iconMap[feature.icon]"
                                    v-if="iconMap[feature.icon]"
                                    class="text-secondary-100 w-6 h-6"
                                />
                                <div v-if="index !== featuresContent.items.length - 1"
                                     class="absolute top-20 w-px border-s-2 border-dotted border-secondary-300 h-full">
                                </div>
                            </div>

                            <div class="w-full md:w-3/4">
                                <h4 class="text-lg md:text-xl font-semibold text-start" v-text="feature.title"></h4>
                                <p class="mt-2 text-sm md:text-base text-gray-700 text-start"
                                   v-text="feature.description"></p>
                            </div>
                        </div>

                        <!--                       Decorative-->
                        <div class="hidden lg:block absolute -bottom-32 left-12">
                            <h3 class="text-xl w-[60%] translate-y-16 translate-x-20 -rotate-10 rtl:translate-y-20 rtl:translate-x-20"
                                v-text="translations.caption"></h3>
                            <FeatureArrow/>
                        </div>
                    </div>

                    <!--                    CV CTA-->
                    <div class="relative w-full flex justify-center">

                        <div class="relative inline-block">
                            <img :src="'/assets/images/feature_section.webp'"
                                 alt="Feature Image"
                                 class="w-full max-w-125 md:max-w-150 h-80 md:h-130 object-cover rounded-xl shadow-xl">

                            <!--                            Decorative Star-->
                            <img
                                :src="'/assets/svg/star.svg'"
                                alt="decorative star"
                                class="absolute -top-5 -inset-e-6 w-8 md:w-12 lg:w-14 pointer-events-none select-none"
                            />
                        </div>

                        <!--                        CV CTA-->
                        <div
                            class="absolute bottom-4 inset-s-1/2 -translate-x-1/2 rtl:translate-x-1/2 md:start-auto md:inset-e-6 md:translate-x-0 rtl:md:translate-x-0">
                            <a :href="'assets/docs/Youcef_Nezrek_CV.pdf'" class="group flex items-center gap-3 bg-white/90 backdrop-blur px-3 py-3 rounded-xl
                                shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-200"
                               target="_blank">

                                <div
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-900 text-white">
                                    <DownloadSimple
                                        class="w-5 h-5 group-hover:translate-y-0.5 transition"/>
                                </div>

                                <div class="text-start">
                                    <p class="text-sm font-semibold text-slate-900"
                                       v-text="translations.download_label"></p>
                                    <p class="text-xs text-gray-500" v-text="translations.view_experience_label"></p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </Section>
    </div>

</template>


