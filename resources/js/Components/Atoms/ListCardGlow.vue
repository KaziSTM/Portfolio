<script setup lang="ts">
import BorderGlow from '@/Components/Atoms/BorderGlow.vue'
import { computed } from 'vue'

/**
 * ListCardGlow — dedicated glow wrapper for project listing cards.
 *
 * The critical fix vs. using BorderGlow directly:
 *   The parent grid cell has overflow:hidden with NO border-radius (rectangular).
 *   BorderGlow's outer glow span extends -glowRadius px outside the card.
 *   When the PARENT clips this, it cuts at a hard rectangle → square corners.
 *
 *   Solution: wrap BorderGlow in a div that has overflow:hidden WITH the correct
 *   border-radius. This clips the outer glow to the card's own rounded shape,
 *   so the glow follows the corners correctly — rounded where the card is rounded.
 */

const props = defineProps<{
    reverse?: boolean
    className?: string
}>()

const borderRadius = computed(() =>
    props.reverse ? '1rem 1rem 3rem 1rem' : '3rem 1rem 1rem 1rem',
)
</script>

<template>
    <!--
        Clipping shell: same border-radius as the card + overflow-hidden.
        The outer glow span inside BorderGlow extends beyond the card boundary;
        this shell clips it to the card's rounded shape instead of letting
        the parent's rectangular overflow-hidden create square corner cutoffs.
    -->
    <div
        :style="{
            borderRadius,
            overflow: 'hidden',
        }"
        :class="className"
    >
        <BorderGlow
            :edge-sensitivity="30"
            glow-color="171 92 35"
            background-color="#f1f5f9"
            :border-radius="borderRadius"
            :glow-radius="28"
            :glow-intensity="0.75"
            :cone-spread="20"
            :animated="false"
            :colors="['#21e0c0', '#08b89d', '#049d89']"
            card-shadow="0 2px 8px var(--color-secondary-200, #e2e8f0), 0 1px 3px var(--color-secondary-300, #cbd5e1)"
        >
            <slot />
        </BorderGlow>
    </div>
</template>
