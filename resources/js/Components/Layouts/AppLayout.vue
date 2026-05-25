<script setup>
import { computed, watchEffect } from 'vue'
import { usePage } from '@inertiajs/vue3'
import Header from "../Organisms/Header.vue";
import Footer from "../Organisms/Footer.vue";

const page = usePage()

const languageTag = computed(() => page.props.languageTag ?? 'en')
const direction = computed(() => page.props.direction ?? 'ltr')

watchEffect(() => {
    if (typeof document === 'undefined') {
        return
    }

    document.documentElement.lang = languageTag.value
    document.documentElement.dir = direction.value
})
</script>

<template>
    <div class="flex flex-col w-full min-h-screen overflow-hidden bg-slate-50 text-secondary-900">
        <Header/>
        <main class="grow">
            <slot></slot>
        </main>
    </div>
    <Footer/>
</template>
