<script setup>
defineProps({
    toolsSectionCaption: {
        type: String,
        required: true,
    },
})

const tools = [
    {
        src: 'assets/svg/icons/php.svg',
        alt: 'PHP',
    },
    {
        src: 'assets/svg/icons/tailwindcss.svg',
        alt: 'Tailwind Css',
    },
    {
        src: 'assets/svg/icons/alpinejs.svg',
        alt: 'AlpineJs',
    },
    {
        src: 'assets/svg/icons/laravel.svg',
        alt: 'Laravel',
    },
    {
        src: 'assets/svg/icons/livewire.svg',
        alt: 'Livewire',
    },
    {
        src: 'assets/svg/icons/mysql.svg',
        alt: 'Mysql',
    },
    {
        src: 'assets/svg/icons/postgres.svg',
        alt: 'Postgres',
    },
    {
        src: 'assets/svg/icons/javascript.svg',
        alt: 'Javascript',
    },
    {
        src: 'assets/svg/icons/vue.svg',
        alt: 'VueJs',
    },
]
</script>

<template>
    <section class="relative flex flex-col items-center my-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-x-4 sm:gap-x-8 lg:gap-x-12">
            <div
                v-for="(tool, index) in tools"
                :class="
                    index % 4 === 0
                        ? 'mt-3'
                        : index % 4 === 1
                          ? 'mt-6'
                          : index % 4 === 2
                            ? 'mt-9'
                            : 'mt-0'
                "
                class="relative min-w-20 h-20 bg-white shadow-xs rounded-full flex flex-col items-center justify-center"
            >
                <img :alt="tool.alt" :src="tool.src" class="h-8 w-8 sm:h-12 sm:w-12" />
            </div>
        </div>

        <!--            Decorative caption -->
        <div class="hidden lg:flex rtl:hidden absolute top-32 inset-e-0 items-start gap-1">
            <img :src="'assets/svg/tools.svg'" alt="arrow" class="h-12 w-12 sm:h-16 sm:w-16" />
            <h3 class="text-xl w-[60%] relative top-8 rotate-10" v-text="toolsSectionCaption"></h3>
        </div>

        <div class="hidden lg:flex ltr:hidden absolute top-32 inset-e-0 items-start gap-1">
            <img
                :src="'assets/svg/tools_arrow_rtl.svg'"
                alt="arrow"
                class="h-12 w-12 sm:h-16 sm:w-16"
            />
            <h3 class="text-xl w-[60%] relative top-2" v-text="toolsSectionCaption"></h3>
        </div>
    </section>
</template>
