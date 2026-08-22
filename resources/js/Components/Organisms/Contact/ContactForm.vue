<script setup>
import { computed } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import SpecularButton from '@/Components/Atoms/SpecularButton.vue'

const page = usePage()

const props = defineProps({
    formContent: {
        type: Object,
        required: true,
    },
    services: {
        type: Object,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const flash = computed(() => page.props.flash ?? {})

const contactTranslations = computed(() => props.translations.contact ?? {})
const fieldTranslations = computed(() => contactTranslations.value.fields ?? {})
const placeholderTranslations = computed(() => contactTranslations.value.placeholders ?? {})

const form = useForm({
    name: '',
    email: '',
    phone: '',
    message: '',
    services: { ...props.services },
})

const inputFields = computed(() => [
    {
        name: 'name',
        type: 'text',
        label: fieldTranslations.value.name ?? 'Name',
        placeholder: placeholderTranslations.value.name ?? 'John Doe',
    },
    {
        name: 'email',
        type: 'email',
        label: fieldTranslations.value.email ?? 'Email',
        placeholder: placeholderTranslations.value.email ?? 'john@email.com',
    },
    {
        name: 'phone',
        type: 'text',
        label: fieldTranslations.value.phone ?? 'Phone',
        placeholder: placeholderTranslations.value.phone ?? '+213 XXX XXX XXX',
    },
])

function submit() {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('name', 'email', 'phone', 'message')

            Object.keys(form.services).forEach((key) => {
                form.services[key] = false
            })
        },
    })
}
</script>

<template>
    <div
        class="w-full rounded-3xl px-6 py-12 sm:px-8 sm:py-14 lg:w-3/5 lg:pe-12 lg:ps-20 xl:pe-16 xl:ps-28"
    >
        <div class="max-w-xl">
            <h2 class="text-start text-xl font-semibold text-gray-900 sm:text-2xl lg:text-[26px]">
                {{ formContent.title }}
            </h2>

            <p class="mt-2 text-start text-sm text-gray-500">
                {{ formContent.description }}
            </p>

            <div
                v-if="flash.success"
                class="mt-4 rounded-xl bg-green-50 px-4 py-3 text-sm text-green-700"
            >
                {{ flash.success }}
            </div>

            <div
                v-if="flash.error"
                class="mt-4 rounded-xl bg-red-50 px-4 py-3 text-sm text-red-700"
            >
                {{ flash.error }}
            </div>

            <form class="mt-6 space-y-6 sm:mt-8" @submit.prevent="submit">
                <div v-for="field in inputFields" :key="field.name">
                    <label class="mb-1.5 block text-start text-sm text-gray-700">
                        {{ field.label }}
                    </label>

                    <input
                        v-model="form[field.name]"
                        :placeholder="field.placeholder"
                        :type="field.type"
                        class="w-full rounded-xl border border-transparent bg-gray-200 px-4 py-3.5 text-start text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-200"
                        dir="ltr"
                    />

                    <p v-if="form.errors[field.name]" class="mt-1 text-sm text-red-600">
                        {{ form.errors[field.name] }}
                    </p>
                </div>

                <div>
                    <label class="mb-1.5 block text-start text-sm text-gray-700">
                        {{ fieldTranslations.message ?? 'Message' }}
                    </label>

                    <textarea
                        v-model="form.message"
                        :placeholder="
                            placeholderTranslations.message ??
                            'Tell me a little about your project...'
                        "
                        class="w-full resize-none rounded-xl border border-transparent bg-gray-200 px-4 py-3.5 text-start text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-primary-500 focus:bg-white focus:ring-2 focus:ring-primary-200"
                        rows="4"
                    ></textarea>

                    <p v-if="form.errors.message" class="mt-1 text-sm text-red-600">
                        {{ form.errors.message }}
                    </p>
                </div>

                <div>
                    <label class="mb-3 block text-start text-sm text-gray-700">
                        {{ fieldTranslations.services ?? 'Services required' }}
                    </label>

                    <div class="grid grid-cols-1 gap-3 text-sm text-gray-700 sm:grid-cols-2">
                        <label
                            v-for="(enabled, service) in form.services"
                            :key="service"
                            class="flex cursor-pointer items-center gap-2"
                        >
                            <input
                                v-model="form.services[service]"
                                class="h-4 w-4 rounded border-gray-300 text-primary-500 focus:ring-primary-400"
                                type="checkbox"
                            />

                            <span>{{ service }}</span>
                        </label>
                    </div>

                    <p v-if="form.errors.services" class="mt-1 text-sm text-red-600">
                        {{ form.errors.services }}
                    </p>
                </div>

                <div class="mt-4 w-full">
                    <SpecularButton
                        :auto-animate="false"
                        :blur="0"
                        :disabled="form.processing"
                        :intensity="1.5"
                        :proximity="280"
                        :radius="14"
                        :shine-fade="38"
                        :shine-size="12"
                        :speed="0.35"
                        :thickness="1"
                        :tint-opacity="1"
                        base-color="#0c635a"
                        class="w-full"
                        follow-mouse
                        line-color="#21e0c0"
                        size="md"
                        text-color="#f3f4f6"
                        tint="#030712"
                        type="submit"
                    >
                        <span v-if="!form.processing" class="font-medium">
                            {{ formContent.submit_label }}
                        </span>
                        <span v-else class="font-medium">
                            {{ formContent.submitting_label }}
                        </span>
                    </SpecularButton>
                </div>
            </form>
        </div>
    </div>
</template>
