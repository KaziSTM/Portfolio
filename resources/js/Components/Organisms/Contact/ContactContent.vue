<script setup>
import ContactArrow from '@/Components/Icons/ContactArrow.vue'
import AtSymbol from '@/Components/Icons/AtSymbol.vue'
import Phone from '@/Components/Icons/Phone.vue'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const hero = computed(() => page.props.cms.contact.hero ?? {})
const contacts = computed(() => page.props.cms.contact.contacts ?? [])

function getContactIcon(iconName) {
    const icons = {
        'heroicon-o-phone': Phone,
        'heroicon-o-at-symbol': AtSymbol,
    }

    return icons[iconName] ?? Phone
}
</script>

<template>
    <div
        class="relative w-full overflow-visible rounded-3xl bg-gray-100 px-6 py-12 sm:px-8 sm:py-14 lg:w-2/5 lg:pe-10 lg:ps-16 xl:pe-16 xl:ps-24"
    >
        <div class="relative flex flex-col justify-between gap-10">
            <h2
                class="text-start text-3xl font-semibold leading-[1.2] text-gray-900 sm:text-4xl lg:text-[44px] xl:text-5xl"
            >
                {{ hero.title }}<br />
                {{ hero.subtitle }} 👋
            </h2>

            <div class="relative flex justify-center lg:block">
                <img
                    :src="'/assets/images/feature_section.webp'"
                    alt="Contact"
                    class="mx-auto h-56 w-full max-w-65 rounded-2xl object-cover shadow-lg sm:h-64 sm:max-w-75 md:h-72 md:max-w-85 lg:h-64 lg:max-w-none xl:h-72 md:translate-x-14 lg:translate-x-16 xl:translate-x-24 rtl:md:-translate-x-14 rtl:lg:-translate-x-16 rtl:xl:-translate-x-24"
                />
            </div>

            <div class="space-y-5">
                <div class="mt-6 flex items-start gap-1 rtl:flex-row-reverse md:gap-3 sm:mt-10">
                    <h3
                        class="max-w-40 -rotate-3 text-start text-lg font-medium leading-snug text-gray-700 rtl:rotate-3 sm:max-w-45 sm:text-xl"
                    >
                        {{ hero.reach_label }}
                    </h3>

                    <ContactArrow class="-mt-1 w-17.5 -rotate-90 text-gray-700 md:mt-2" />
                </div>

                <div class="mt-6 grid grid-cols-1 gap-5 pt-2 sm:grid-cols-2 sm:gap-6">
                    <div
                        v-for="contact in contacts"
                        :key="contact.title"
                        class="flex items-start gap-3"
                    >
                        <component
                            :is="getContactIcon(contact.icon)"
                            class="mt-1 h-5 w-5 shrink-0 text-primary-500"
                        />

                        <div class="text-start">
                            <p class="text-sm font-semibold text-gray-900 sm:text-base">
                                {{ contact.title }}
                            </p>

                            <p class="mt-0.5 text-xs text-gray-500 sm:text-sm">
                                {{ contact.description }}
                            </p>

                            <p class="mt-1 text-sm text-primary-500 sm:text-base">
                                <span class="inline-block" dir="ltr">
                                    {{ contact.value }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
