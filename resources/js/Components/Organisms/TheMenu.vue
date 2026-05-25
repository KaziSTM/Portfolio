<script setup>
import Navbar from "@/Components/Organisms/Navbar.vue";
import MobileMenu from "@/Components/Organisms/MobileMenu.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage()

const navigation = computed(() => page.props.navigation)
</script>

<template>

    <div class="hidden md:flex">
        <Navbar :navigation="navigation" class="w-full flex items-center justify-center gap-6"/>
    </div>

    <div class="relative flex md:hidden">
        <MobileMenu :navigation="navigation"/>
    </div>

</template>

<style scoped>

</style>
