<script setup>
import { Head } from '@inertiajs/vue3'

import AppLayout from '@/Components/Layouts/AppLayout.vue'
import useGetTitle from '@/Composables/useGetTitle.js'
import ContactContent from '@/Components/Organisms/Contact/ContactContent.vue'
import ContactForm from '@/Components/Organisms/Contact/ContactForm.vue'

const title = useGetTitle('contact')
</script>

<template>
    <Head :title="title" />

    <AppLayout>
        <section class="w-full px-4 py-12 sm:px-6 md:px-10 md:py-16">
            <div class="flex flex-col gap-10 lg:flex-row lg:gap-0">
                <ContactContent />

                <ContactForm />
            </div>
        </section>
    </AppLayout>
</template>
