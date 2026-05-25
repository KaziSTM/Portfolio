<script setup>
import {computed} from 'vue'
import {Link, usePage} from '@inertiajs/vue3'

import Logo from '../Atoms/Logo.vue'
import TheMenu from './TheMenu.vue'
import LangSwitch from '../Molecules/LangSwitch.vue'

const page = usePage()

const headerContent = computed(() => page.props.cms.header)
</script>

<template>
    <header class="relative z-99 border-b border-secondary-200 py-4 md:py-6">
        <div
            class="mx-auto flex w-full max-w-8xl items-center justify-between px-6 md:px-32"
        >
            <div class="shrink-0">
                <Logo class="h-10 w-12"/>
            </div>

            <TheMenu/>

            <div class="hidden items-center gap-4 md:flex">
                <LangSwitch/>

                <Link
                    class="rounded-2xl border border-secondary-200 bg-slate-100 px-6 py-2 focus:outline-hidden"
                    href="/contact"
                >
                    <span class="font-semibold text-secondary-900">
                        {{ headerContent.cta_label }}
                    </span>
                </Link>
            </div>

            <div class="flex items-center gap-3 md:hidden">
                <LangSwitch/>
            </div>
        </div>
    </header>
</template>
