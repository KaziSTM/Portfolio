<script setup>
import Subtitle from '@/Components/Atoms/Subtitle.vue'

defineProps({
    stack: {
        type: Object,
        required: true,
    },
})
const portrait_url = '/assets/images/portrait-4.webp'
</script>
<template>
    <section class="container mx-auto text-start pb-6 mt-16 md:mt-0">
        <div
            class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:gap-32 px-4 md:px-16 lg:px-32 xl:px-48 md:py-12 lg:py-24 xl:py-32"
        >
            <!-- Image -->
            <div class="order-2 lg:order-1 rtl:lg:order-2">
                <img
                    :src="portrait_url"
                    alt="About Image"
                    class="rounded-2xl"
                    sizes="(min-width: 1024px) 33vw, 100vw"
                />
            </div>
            <!-- Content -->
            <div class="order-1 lg:order-2 rtl:lg:order-1">
                <Subtitle v-text="stack.content.title"></Subtitle>
                <p
                    class="mt-6 text-lg lg:text-xl text-gray-700"
                    v-text="stack.content.description"
                ></p>
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <template
                        v-for="(tool, index) in stack.tools"
                        v-if="stack.tools.length > 0"
                        :key="index"
                    >
                        <div class="flex gap-4 items-center p-4 border rounded-lg bg-slate-100">
                            <img
                                :alt="tool.alt"
                                :src="tool.src"
                                aria-hidden="true"
                                class="h-8 w-8 sm:h-12 sm:w-12"
                            />
                            <h3 class="text-lg font-semibold" v-text="tool.alt"></h3>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
</template>
