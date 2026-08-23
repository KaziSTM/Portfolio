<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import ListCardGlow from '@/Components/Atoms/ListCardGlow.vue'
import Cta from '@/Components/Atoms/Cta.vue'
import FadeContent from '@/Components/Molecules/FadeContent.vue'

defineProps({
    project: Object,
    reverse: {
        type: Boolean,
        default: false,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const zoom = ref(false)
</script>

<template>
    <FadeContent
        :blur="true"
        :delay="100"
        :duration="700"
        :initial-opacity="10"
        :threshold="0.1"
        class-name="my-fade-content"
        easing="ease-out"
    >
        <ListCardGlow
            :reverse="reverse"
            :class-name="reverse ? 'md:mt-24 lg:mt-32' : ''"
        >
            <!-- Inner padding wrapper — same classes as original card, background removed (BorderGlow provides it) -->
            <div class="p-6 sm:p-7 lg:p-8 h-full flex flex-col justify-between items-center text-center">
                <div class="space-y-4 flex flex-col items-center w-full">
                    <!--  IMAGE (TOP) -->
                    <Link
                        v-if="!reverse"
                        :href="project.project_url"
                        class="mb-5 sm:mb-6 lg:mb-7 overflow-hidden rounded-2xl w-full cursor-pointer block"
                        @mouseenter="zoom = true"
                        @mouseleave="zoom = false"
                    >
                        <img
                            :alt="project.header"
                            :class="{ 'scale-110': zoom }"
                            :src="project.logo_url"
                            class="w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"
                        />
                    </Link>

                    <!-- CONTENT -->
                    <div class="space-y-3.5 sm:space-y-4 flex flex-col items-center w-full">
                        <div class="flex items-center justify-center flex-wrap gap-2 text-xs tracking-widest uppercase">
                            <!-- TYPE -->
                            <span
                                class="inline-block rounded-md border border-gray-400 px-2.5 py-1 text-[10px] font-medium text-gray-700"
                                v-text="project.type_label"
                            ></span>

                            <!-- PROGRESS -->
                            <span
                                v-if="project.is_in_progress"
                                class="inline-block rounded-md bg-amber-100 px-2.5 py-1 text-[10px] font-medium text-amber-700 normal-case tracking-normal"
                            >
                                {{ translations.projects?.ongoing ?? translations.projects?.in_progress ?? 'Ongoing' }}
                            </span>

                            <!-- ROLES -->
                            <div
                                class="flex flex-wrap items-center justify-center gap-2 text-xs tracking-widest uppercase text-gray-600"
                            >
                                <template v-for="(role, index) in project.role_labels" :key="role">
                                    <span>{{ role }}</span>
                                    <span
                                        v-if="index !== project.role_labels.length - 1"
                                        class="opacity-30"
                                    >•</span>
                                </template>
                            </div>
                        </div>

                        <!-- TITLE -->
                        <h3
                            class="block mt-2.5 sm:mt-3.5 text-xl sm:text-2xl font-semibold text-gray-900 leading-snug font-display text-center"
                            v-text="project.header"
                        ></h3>

                        <!-- DESCRIPTION -->
                        <p
                            v-if="project.description"
                            class="line-clamp-3 text-center leading-relaxed text-gray-600 text-sm sm:text-base"
                            v-html="project.description"
                        />
                    </div>
                </div>

                <!-- FOOTER / CTA -->
                <div class="mt-5 pt-2 flex justify-center w-full">
                    <Cta
                        :is-package="project.is_package"
                        :project-id="project.id"
                        :project-title="project.header"
                        :translations="translations"
                        :url="project.project_url"
                    />
                </div>

                <!-- IMAGE (BOTTOM ON REVERSED) -->
                <Link
                    v-if="reverse"
                    :href="project.project_url"
                    class="mt-5 sm:mt-6 lg:mt-7 overflow-hidden rounded-2xl w-full cursor-pointer block"
                    @mouseenter="zoom = true"
                    @mouseleave="zoom = false"
                >
                    <img
                        :alt="project.header"
                        :class="{ 'scale-110': zoom }"
                        :src="project.logo_url"
                        class="w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"
                    />
                </Link>
            </div>
        </ListCardGlow>
    </FadeContent>
</template>
