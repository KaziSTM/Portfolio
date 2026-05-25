<script setup>
import NavLink from "@/Components/Atoms/NavLink.vue";

defineProps({
    navigation: {
        type: Object,
        required: true,
    }
})
</script>

<template>
    <nav aria-label="Primary">
        <ul class="flex items-center gap-6">
            <NavLink
                v-for="link in navigation"
                :key="link.route"
                :href="link.route"
                :label="link.label"
            />
        </ul>
    </nav>
</template>

<style scoped>

</style>
