<script setup>
import { ref } from 'vue'
import { Head } from '@inertiajs/vue3'

import AppLayout from '@/Components/Layouts/AppLayout.vue'
import useGetTitle from '@/Composables/useGetTitle'
import Testimonials from '@/Components/Organisms/Projects/Testimonials.vue'
import ProjectHero from '@/Components/Organisms/Projects/ProjectHero.vue'
import ProjectContent from '@/Components/Organisms/Projects/ProjectContent.vue'
import ImageModal from '@/Components/Molecules/ImageModal.vue'

const props = defineProps({
    project: {
        type: Object,
        required: true,
    },
})

const title = useGetTitle('project')

// Image Preview Lightbox State
const isModalOpen = ref(false)
const modalImages = ref([])
const modalIndex = ref(0)

const openHeroPreview = () => {
    const isDesktop = typeof window !== 'undefined' && window.innerWidth >= 768
    const heroSrc = (isDesktop && props.project.data.main_url) ? props.project.data.main_url : (props.project.data.logo_url || props.project.data.main_url)
    if (!heroSrc) return
    modalImages.value = [{ url: heroSrc, alt: props.project.data.header }]
    modalIndex.value = 0
    isModalOpen.value = true
}

const openGalleryPreview = (index) => {
    if (!props.project.data.gallery?.length) return
    modalImages.value = props.project.data.gallery.map((img) => ({
        url: img.url,
        alt: props.project.data.header,
    }))
    modalIndex.value = index
    isModalOpen.value = true
}

const closeModal = () => {
    isModalOpen.value = false
}
</script>

<template>
    <Head :title="title" />

    <AppLayout>
        <!-- HERO -->
        <ProjectHero :project="project.data" />

        <!-- HERO IMAGE -->
        <section v-if="project.data.main_url || project.data.logo_url" class="w-full">
            <picture class="w-full block">
                <source
                    v-if="project.data.main_url"
                    media="(min-width: 768px)"
                    :srcset="project.data.main_url"
                />
                <img
                    :alt="project.data.header"
                    :src="project.data.logo_url || project.data.main_url"
                    class="w-full h-auto max-h-[60vh] md:max-h-[85vh] object-cover cursor-zoom-in hover:opacity-95 transition-opacity"
                    @click="openHeroPreview"
                />
            </picture>
        </section>

        <!-- CONTENT -->
        <ProjectContent :project="project.data" />

        <!-- GALLERY -->
        <section
            v-if="project.data.gallery?.length"
            class="mx-auto grid max-w-7xl gap-4 sm:gap-8 px-4 sm:px-6 pb-12 sm:pb-24 grid-cols-1 md:grid-cols-2"
        >
            <img
                v-for="(image, index) in project.data.gallery"
                :key="image.url"
                :alt="project.data.header"
                :src="image.url"
                class="w-full rounded-lg object-cover cursor-zoom-in hover:opacity-95 hover:scale-[1.01] transition-all duration-200"
                @click="openGalleryPreview(index)"
            />
        </section>

        <!-- TESTIMONIALS -->
        <Testimonials
            v-if="project.data.testimonials?.length"
            :testimonials="project.data.testimonials"
        />

        <!-- IMAGE PREVIEW LIGHTBOX MODAL -->
        <ImageModal
            :open="isModalOpen"
            :images="modalImages"
            :current-index="modalIndex"
            :alt="project.data.header"
            @close="closeModal"
            @change="(idx) => (modalIndex = idx)"
        />
    </AppLayout>
</template>
