<script setup>
import { computed, nextTick, onMounted, onUnmounted, ref, watch } from 'vue'

const ANIMATION_CONFIG = {
    SMOOTH_TAU: 0.25,
    MIN_COPIES: 2,
    COPY_HEADROOM: 2,
}

const props = defineProps({
    logos: {
        type: Array,
        required: true,
    },

    speed: {
        type: Number,
        default: 120,
    },

    direction: {
        type: String,
        default: 'left',
    },

    width: {
        type: [Number, String],
        default: '100%',
    },

    logoHeight: {
        type: Number,
        default: 60,
    },

    gap: {
        type: Number,
        default: 32,
    },

    pauseOnHover: {
        type: Boolean,
        default: true,
    },

    fadeOut: {
        type: Boolean,
        default: false,
    },

    fadeOutColor: {
        type: String,
        default: null,
    },

    scaleOnHover: {
        type: Boolean,
        default: false,
    },

    ariaLabel: {
        type: String,
        default: 'Partner logos',
    },

    className: {
        type: String,
        default: '',
    },

    style: {
        type: [Object, String],
        default: null,
    },
})

const containerRef = ref(null)
const trackRef = ref(null)
const seqRef = ref(null)

const seqWidth = ref(0)
const copyCount = ref(ANIMATION_CONFIG.MIN_COPIES)
const isHovered = ref(false)

const offsetRef = ref(0)
const velocityRef = ref(0)

let rafRef = null
let lastTimestampRef = null

const targetVelocity = computed(() => {
    const magnitude = Math.abs(props.speed)

    const directionMultiplier = props.direction === 'left' ? 1 : -1

    const speedMultiplier = props.speed < 0 ? -1 : 1

    return magnitude * directionMultiplier * speedMultiplier
})

const cssVariables = computed(() => ({
    '--logoloop-gap': `${props.gap}px`,
    '--logoloop-logoHeight': `${props.logoHeight}px`,
    ...(props.fadeOutColor && {
        '--logoloop-fadeColor': props.fadeOutColor,
    }),
}))

const rootClasses = computed(() => {
    const classes = [
        'relative overflow-x-hidden group',
        '[--logoloop-gap:32px]',
        '[--logoloop-logoHeight:28px]',
        '[--logoloop-fadeColorAuto:#ffffff]',
        'dark:[--logoloop-fadeColorAuto:#0b0b0b]',
    ]

    if (props.scaleOnHover) {
        classes.push('py-[calc(var(--logoloop-logoHeight)*0.1)]')
    }

    if (props.className) {
        classes.push(props.className)
    }

    return classes
})

const containerStyle = computed(() => ({
    width: typeof props.width === 'number' ? `${props.width}px` : props.width,

    ...cssVariables.value,

    ...(typeof props.style === 'object' && props.style !== null ? props.style : {}),
}))

const isNodeItem = (item) => {
    return 'node' in item
}

const getItemAriaLabel = (item) => {
    if (isNodeItem(item)) {
        return item.ariaLabel ?? item.title
    }

    return item.alt ?? item.title
}

const handleMouseEnter = () => {
    if (props.pauseOnHover) {
        isHovered.value = true
    }
}

const handleMouseLeave = () => {
    if (props.pauseOnHover) {
        isHovered.value = false
    }
}

const updateDimensions = async () => {
    await nextTick()

    const containerWidth = containerRef.value?.clientWidth ?? 0

    const sequenceWidth = seqRef.value?.getBoundingClientRect()?.width ?? 0

    if (sequenceWidth > 0) {
        seqWidth.value = Math.ceil(sequenceWidth)

        const copiesNeeded =
            Math.ceil(containerWidth / sequenceWidth) + ANIMATION_CONFIG.COPY_HEADROOM

        copyCount.value = Math.max(ANIMATION_CONFIG.MIN_COPIES, copiesNeeded)

        cleanupAnimation?.()
        cleanupAnimation = startAnimationLoop()
    }
}

let resizeObserver = null

const setupResizeObserver = () => {
    if (!window.ResizeObserver) {
        const handleResize = () => {
            updateDimensions()
        }

        window.addEventListener('resize', handleResize)

        updateDimensions()

        return () => {
            window.removeEventListener('resize', handleResize)
        }
    }

    resizeObserver = new ResizeObserver(updateDimensions)

    if (containerRef.value) {
        resizeObserver.observe(containerRef.value)
    }

    if (seqRef.value) {
        resizeObserver.observe(seqRef.value)
    }

    updateDimensions()

    return () => {
        resizeObserver?.disconnect()
        resizeObserver = null
    }
}

const setupImageLoader = () => {
    const images = seqRef.value?.querySelectorAll('img') ?? []

    if (images.length === 0) {
        updateDimensions()

        return
    }

    let remainingImages = images.length

    const handleImageLoad = () => {
        remainingImages--

        if (remainingImages === 0) {
            updateDimensions()
        }
    }

    images.forEach((img) => {
        if (img.complete) {
            handleImageLoad()
        } else {
            img.addEventListener('load', handleImageLoad, { once: true })

            img.addEventListener('error', handleImageLoad, { once: true })
        }
    })

    return () => {
        images.forEach((img) => {
            img.removeEventListener('load', handleImageLoad)

            img.removeEventListener('error', handleImageLoad)
        })
    }
}

const startAnimationLoop = () => {
    const track = trackRef.value

    if (!track) {
        return
    }

    const prefersReduced =
        typeof window !== 'undefined' &&
        window.matchMedia &&
        window.matchMedia('(prefers-reduced-motion: reduce)').matches

    if (seqWidth.value > 0) {
        offsetRef.value = ((offsetRef.value % seqWidth.value) + seqWidth.value) % seqWidth.value

        track.style.transform = `translate3d(${-offsetRef.value}px,0,0)`
    }

    if (prefersReduced) {
        track.style.transform = 'translate3d(0,0,0)'

        return () => {
            lastTimestampRef = null
        }
    }

    const animate = (timestamp) => {
        if (lastTimestampRef === null) {
            lastTimestampRef = timestamp
        }

        const deltaTime = Math.max(0, timestamp - lastTimestampRef) / 1000

        lastTimestampRef = timestamp

        const target = props.pauseOnHover && isHovered.value ? 0 : targetVelocity.value

        const easingFactor = 1 - Math.exp(-deltaTime / ANIMATION_CONFIG.SMOOTH_TAU)

        velocityRef.value += (target - velocityRef.value) * easingFactor

        if (seqWidth.value > 0) {
            let nextOffset = offsetRef.value + velocityRef.value * deltaTime

            nextOffset = ((nextOffset % seqWidth.value) + seqWidth.value) % seqWidth.value

            offsetRef.value = nextOffset

            track.style.transform = `translate3d(${-offsetRef.value}px,0,0)`
        }

        rafRef = requestAnimationFrame(animate)
    }

    rafRef = requestAnimationFrame(animate)

    return () => {
        if (rafRef !== null) {
            cancelAnimationFrame(rafRef)
            rafRef = null
        }

        lastTimestampRef = null
    }
}

let cleanupResize
let cleanupImages
let cleanupAnimation

const cleanup = () => {
    cleanupResize?.()
    cleanupImages?.()
    cleanupAnimation?.()
}

onMounted(async () => {
    await nextTick()

    setTimeout(() => {
        cleanupResize = setupResizeObserver()

        cleanupImages = setupImageLoader()
    }, 10)
})

onUnmounted(() => {
    cleanup()
})

watch(
    [() => props.logos, () => props.gap, () => props.logoHeight],
    async () => {
        await nextTick()

        cleanupImages?.()
        cleanupImages = setupImageLoader()
    },
    {
        deep: true,
    },
)
</script>
