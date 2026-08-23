<script setup>
import { ref } from 'vue'
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
        <div
            :class="{
                'md:mt-24 lg:mt-32 rounded-br-[3rem]': reverse,
                'rounded-tl-[3rem]': !reverse,
            }"
            class="bg-slate-100 p-8 sm:p-10 h-full rounded-2xl flex flex-col justify-between items-center text-center"
        >
            <div class="space-y-6 flex flex-col items-center w-full">
                <!--       IMAGE (TOP) -->
                <div
                    v-if="!reverse"
                    class="mb-10 sm:mb-12 lg:mb-14 overflow-hidden rounded-2xl w-full cursor-pointer"
                    @mouseenter="zoom = true"
                    @mouseleave="zoom = false"
                >
                    <img
                        :alt="project.header"
                        :class="{
                            'scale-110': zoom,
                        }"
                        :src="project.logo_url"
                        class="w-full h-56 sm:h-64 lg:h-72 object-cover rounded-2xl transition-transform duration-500 ease-in-out"
                    />
                </div>

                <!--           CONTENT -->
                <div class="space-y-4 flex flex-col items-center w-full">
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
                                <span>
                                    {{ role }}
                                </span>

                                <span
                                    v-if="index !== project.role_labels.length - 1"
                                    class="opacity-30"
                                >
                                    •
                                </span>
                            </template>
                        </div>
                    </div>

                    <!-- TITLE -->
                    <h3
                        class="block text-xl sm:text-2xl font-semibold text-gray-900 leading-snug font-display text-center"
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
            <div class="mt-8 pt-4 flex justify-center w-full">
                <Cta
                    :is-package="project.is_package"
                    :project-id="project.id"
                    :project-title="project.header"
                    :translations="translations"
                    :url="project.project_url"
                />
            </div>

            <!-- IMAGE (BOTTOM ON REVERSED) -->
            <div
                v-if="reverse"
                class="mt-10 sm:mt-12 lg:mt-14 overflow-hidden rounded-2xl w-full cursor-pointer"
                @mouseenter="zoom = true"
                @mouseleave="zoom = false"
            >
                <img
                    :alt="project.header"
                    :class="{
                        'scale-110': zoom,
                    }"
                    :src="project.logo_url"
                    class="w-full h-56 sm:h-64 lg:h-72 object-cover rounded-2xl transition-transform duration-500 ease-in-out"
                />
            </div>
        </div>
    </FadeContent>
</template>
