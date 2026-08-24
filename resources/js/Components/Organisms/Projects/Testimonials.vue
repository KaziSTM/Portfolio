<script setup>
defineProps({
    testimonials: {
        type: Array,
        required: true,
    }
})

</script>

<template>
    <section class="mx-auto max-w-6xl px-4 sm:px-6 pb-12 sm:pb-24">
        <div class="grid gap-6 sm:gap-8 grid-cols-1 md:grid-cols-2">
            <article
                v-for="testimonial in testimonials"
                :key="testimonial.id"
                class="rounded-2xl bg-slate-100 p-5 sm:p-8"
            >
                <p class="mb-6 text-gray-700" v-text="testimonial.content"></p>

                <div>
                    <p class="font-semibold text-gray-900" v-text="testimonial.author"></p>

                    <p class="text-sm text-gray-500" v-text="testimonial.position"></p>
                </div>
            </article>
        </div>
    </section>
</template>

