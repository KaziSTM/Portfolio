<script setup>
import NavLink from "../Atoms/NavLink.vue";

defineProps({
    navigation: {
        type: Object,
        required: true,
    }
})
</script>

<template>
    <div>
        <NavLink v-for="link in navigation" :key="link.name"
                 :href="link.route"
                 :label="link.label"
        >
        </NavLink>
    </div>
</template>

<style scoped>

</style>
