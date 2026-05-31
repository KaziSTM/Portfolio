<script setup>
import Cta from '@/Components/Atoms/Cta.vue'
import FadeContent from '@/Components/Molecules/FadeContent.vue'

defineProps({
    project: Object,
    reverse: {
        type: Boolean,
        default: false,
    },
})
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
            class="bg-slate-100 p-8 md:py-10 md:px-16 h-full rounded-2xl"
        >
            <div class="grid gap-10">
                <!--       IMAGE (TOP OR BOTTOM) -->

                <div v-if="!reverse" class="mb-2">
                    <img
                        :alt="project.header"
                        :src="project.logo_url"
                        class="w-full h-auto object-contain"
                    />
                </div>

                <!--           CONTENT -->
                <div class="space-y-10">
                    <div class="flex items-center justify-between">
                        <!--                     TYPE -->
                        <span
                            class="inline-block rounded border border-gray-400 px-2 py-1 text-[10px] font-medium tracking-widest uppercase text-gray-700"
                            v-text="project.type_label"
                        ></span>

                        <!--                    ROLES -->
                        <div
                            class="flex flex-wrap gap-2 text-xs tracking-widest uppercase text-gray-600"
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

                    <!--                TITLE-->
                    <span
                        class="text-2xl font-semibold text-gray-900 leading-tight max-w-xs"
                        v-text="project.header"
                    ></span>
                </div>

                <!--            FOOTER -->

                <!-- CTA -->
                <Cta
                    :is-package="project.is_package"
                    :project-id="project.id"
                    :project-title="project.header"
                    :url="project.project_url"
                />

                <!--             IMAGE (BOTTOM ON REVERSED)-->

                <div v-if="reverse" class="mt-2">
                    <img
                        :alt="project.header"
                        :src="project.logo_url"
                        class="w-full h-auto object-contain"
                    />
                </div>
            </div>
        </div>
    </FadeContent>
</template>
