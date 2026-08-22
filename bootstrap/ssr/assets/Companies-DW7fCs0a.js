import { computed, defineComponent, h, mergeProps, nextTick, onMounted, onUnmounted, ref, unref, useSSRContext, watch } from "vue";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderComponent, ssrRenderList, ssrRenderSlot } from "vue/server-renderer";
//#region resources/js/Components/Atoms/LogoLoop.vue?vue&type=script&setup=true&lang.ts
var LogoContent = defineComponent({
	name: "LogoContent",
	props: {
		item: {
			type: Object,
			required: true
		},
		scaleOnHover: {
			type: Boolean,
			default: false
		}
	},
	setup(props) {
		const isNodeItem = (item) => "node" in item;
		return () => {
			const scaleClass = props.scaleOnHover ? "transition-transform duration-300 ease-[cubic-bezier(0.4,0,0.2,1)] group-hover/item:scale-120" : "";
			if (isNodeItem(props.item)) return h("span", {
				class: [
					"inline-flex items-center",
					"motion-reduce:transition-none",
					scaleClass,
					"text-[length:var(--logoloop-logoHeight)] [&>i]:text-[length:var(--logoloop-logoHeight)] [&>i]:leading-[1]"
				].filter(Boolean).join(" "),
				innerHTML: props.item.node,
				"aria-hidden": !!props.item.href && !props.item.ariaLabel ? true : void 0
			});
			return h("img", {
				class: [
					"h-auto w-auto max-h-[var(--logoloop-logoHeight)] max-w-[110px] block object-contain",
					"[-webkit-user-drag:none] pointer-events-none",
					"[image-rendering:-webkit-optimize-contrast]",
					"motion-reduce:transition-none",
					scaleClass
				].filter(Boolean).join(" "),
				src: props.item.src,
				srcset: props.item.srcSet,
				sizes: props.item.sizes,
				width: props.item.width,
				height: props.item.height,
				alt: props.item.alt ?? "",
				title: props.item.title,
				loading: "lazy",
				decoding: "async",
				draggable: false
			});
		};
	}
});
var LogoLoop_vue_vue_type_script_setup_true_lang_default = /*@__PURE__*/ defineComponent({
	__name: "LogoLoop",
	__ssrInlineRender: true,
	props: {
		logos: {},
		speed: { default: 120 },
		direction: { default: "left" },
		width: { default: "100%" },
		logoHeight: { default: 28 },
		gap: { default: 32 },
		pauseOnHover: {
			type: Boolean,
			default: void 0
		},
		hoverSpeed: { default: void 0 },
		fadeOut: {
			type: Boolean,
			default: false
		},
		fadeOutColor: {},
		scaleOnHover: {
			type: Boolean,
			default: false
		},
		ariaLabel: { default: "Partner logos" },
		className: {},
		style: {}
	},
	setup(__props) {
		const ANIMATION_CONFIG = {
			SMOOTH_TAU: .25,
			MIN_COPIES: 2,
			COPY_HEADROOM: 2
		};
		const props = __props;
		const containerRef = ref(null);
		const trackRef = ref(null);
		const seqRef = ref(null);
		const seqWidth = ref(0);
		const seqHeight = ref(0);
		const copyCount = ref(ANIMATION_CONFIG.MIN_COPIES);
		const isHovered = ref(false);
		let rafRef = null;
		let lastTimestampRef = null;
		const offsetRef = ref(0);
		const velocityRef = ref(0);
		const isVertical = computed(() => props.direction === "up" || props.direction === "down");
		const effectiveHoverSpeed = computed(() => {
			if (props.hoverSpeed !== void 0) return props.hoverSpeed;
			if (props.pauseOnHover === true) return 0;
			if (props.pauseOnHover === false) return void 0;
			return 0;
		});
		const targetVelocity = computed(() => {
			const magnitude = Math.abs(props.speed);
			let directionMultiplier;
			if (isVertical.value) directionMultiplier = props.direction === "up" ? 1 : -1;
			else directionMultiplier = props.direction === "left" ? 1 : -1;
			const speedMultiplier = props.speed < 0 ? -1 : 1;
			return magnitude * directionMultiplier * speedMultiplier;
		});
		const cssVariables = computed(() => ({
			"--logoloop-gap": `${props.gap}px`,
			"--logoloop-logoHeight": `${props.logoHeight}px`,
			...props.fadeOutColor ? { "--logoloop-fadeColor": props.fadeOutColor } : {}
		}));
		const rootClasses = computed(() => [
			"relative group",
			isVertical.value ? "overflow-hidden h-full inline-block" : "overflow-x-hidden",
			"[--logoloop-gap:32px]",
			"[--logoloop-logoHeight:28px]",
			"[--logoloop-fadeColorAuto:#ffffff]",
			"dark:[--logoloop-fadeColorAuto:#0b0b0b]",
			props.scaleOnHover && "py-[calc(var(--logoloop-logoHeight)*0.1)]",
			props.className
		].filter(Boolean));
		const containerStyle = computed(() => {
			const w = typeof props.width === "number" ? `${props.width}px` : props.width;
			return {
				...isVertical.value ? w !== "100%" && w ? { width: w } : {} : { width: w ?? "100%" },
				...cssVariables.value,
				...props.style ?? {}
			};
		});
		const isNodeItem = (item) => "node" in item;
		const getItemAriaLabel = (item) => {
			if (isNodeItem(item)) return item.ariaLabel ?? item.title;
			return item.alt ?? item.title;
		};
		const updateDimensions = async () => {
			await nextTick();
			const containerWidth = containerRef.value?.clientWidth ?? 0;
			const sequenceRect = seqRef.value?.getBoundingClientRect?.();
			const sequenceWidth = sequenceRect?.width ?? 0;
			const sequenceHeight = sequenceRect?.height ?? 0;
			if (isVertical.value) {
				const parentHeight = containerRef.value?.parentElement?.clientHeight ?? 0;
				if (containerRef.value && parentHeight > 0) {
					const targetHeight = Math.ceil(parentHeight);
					if (containerRef.value.style.height !== `${targetHeight}px`) containerRef.value.style.height = `${targetHeight}px`;
				}
				if (sequenceHeight > 0) {
					seqHeight.value = Math.ceil(sequenceHeight);
					const viewport = containerRef.value?.clientHeight ?? parentHeight ?? sequenceHeight;
					const copiesNeeded = Math.ceil(viewport / sequenceHeight) + ANIMATION_CONFIG.COPY_HEADROOM;
					copyCount.value = Math.max(ANIMATION_CONFIG.MIN_COPIES, copiesNeeded);
				}
			} else if (sequenceWidth > 0) {
				seqWidth.value = Math.ceil(sequenceWidth);
				const copiesNeeded = Math.ceil(containerWidth / sequenceWidth) + ANIMATION_CONFIG.COPY_HEADROOM;
				copyCount.value = Math.max(ANIMATION_CONFIG.MIN_COPIES, copiesNeeded);
			}
		};
		let resizeObserver = null;
		const setupResizeObserver = () => {
			if (!window.ResizeObserver) {
				window.addEventListener("resize", updateDimensions);
				updateDimensions();
				return () => window.removeEventListener("resize", updateDimensions);
			}
			resizeObserver = new ResizeObserver(updateDimensions);
			if (containerRef.value) resizeObserver.observe(containerRef.value);
			if (seqRef.value) resizeObserver.observe(seqRef.value);
			updateDimensions();
			return () => {
				resizeObserver?.disconnect();
				resizeObserver = null;
			};
		};
		const setupImageLoader = () => {
			const images = seqRef.value?.querySelectorAll("img") ?? [];
			if (images.length === 0) {
				updateDimensions();
				return () => {};
			}
			let remaining = images.length;
			const handleLoad = () => {
				remaining -= 1;
				if (remaining === 0) updateDimensions();
			};
			images.forEach((img) => {
				const htmlImg = img;
				if (htmlImg.complete) handleLoad();
				else {
					htmlImg.addEventListener("load", handleLoad, { once: true });
					htmlImg.addEventListener("error", handleLoad, { once: true });
				}
			});
			return () => {
				images.forEach((img) => {
					img.removeEventListener("load", handleLoad);
					img.removeEventListener("error", handleLoad);
				});
			};
		};
		const startAnimationLoop = () => {
			const track = trackRef.value;
			if (!track) return () => {};
			const prefersReduced = typeof window !== "undefined" && window.matchMedia?.("(prefers-reduced-motion: reduce)").matches;
			const seqSize = isVertical.value ? seqHeight.value : seqWidth.value;
			if (seqSize > 0) {
				offsetRef.value = (offsetRef.value % seqSize + seqSize) % seqSize;
				track.style.transform = isVertical.value ? `translate3d(0, ${-offsetRef.value}px, 0)` : `translate3d(${-offsetRef.value}px, 0, 0)`;
			}
			if (prefersReduced) {
				track.style.transform = "translate3d(0, 0, 0)";
				return () => {
					lastTimestampRef = null;
				};
			}
			const animate = (timestamp) => {
				if (lastTimestampRef === null) lastTimestampRef = timestamp;
				const deltaTime = Math.max(0, timestamp - lastTimestampRef) / 1e3;
				lastTimestampRef = timestamp;
				const target = isHovered.value && effectiveHoverSpeed.value !== void 0 ? effectiveHoverSpeed.value : targetVelocity.value;
				const easingFactor = 1 - Math.exp(-deltaTime / ANIMATION_CONFIG.SMOOTH_TAU);
				velocityRef.value += (target - velocityRef.value) * easingFactor;
				const currentSeqSize = isVertical.value ? seqHeight.value : seqWidth.value;
				if (currentSeqSize > 0) {
					let nextOffset = offsetRef.value + velocityRef.value * deltaTime;
					nextOffset = (nextOffset % currentSeqSize + currentSeqSize) % currentSeqSize;
					offsetRef.value = nextOffset;
					track.style.transform = isVertical.value ? `translate3d(0, ${-offsetRef.value}px, 0)` : `translate3d(${-offsetRef.value}px, 0, 0)`;
				}
				rafRef = requestAnimationFrame(animate);
			};
			rafRef = requestAnimationFrame(animate);
			return () => {
				if (rafRef !== null) {
					cancelAnimationFrame(rafRef);
					rafRef = null;
				}
				lastTimestampRef = null;
			};
		};
		let cleanupResize;
		let cleanupImages;
		let cleanupAnimation;
		const cleanup = () => {
			cleanupResize?.();
			cleanupImages?.();
			cleanupAnimation?.();
		};
		onMounted(async () => {
			await nextTick();
			setTimeout(() => {
				cleanupResize = setupResizeObserver();
				cleanupImages = setupImageLoader();
				cleanupAnimation = startAnimationLoop();
			}, 10);
		});
		onUnmounted(() => {
			cleanup();
		});
		watch([
			() => props.logos,
			() => props.gap,
			() => props.logoHeight,
			() => props.direction
		], async () => {
			await nextTick();
			cleanupImages?.();
			cleanupImages = setupImageLoader();
			cleanupAnimation?.();
			cleanupAnimation = startAnimationLoop();
		}, { deep: true });
		watch([
			() => props.speed,
			() => props.direction,
			() => props.hoverSpeed,
			() => props.pauseOnHover
		], () => {
			cleanupAnimation?.();
			cleanupAnimation = startAnimationLoop();
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({
				ref_key: "containerRef",
				ref: containerRef,
				class: rootClasses.value,
				style: containerStyle.value,
				role: "region",
				"aria-label": __props.ariaLabel
			}, _attrs))}>`);
			if (__props.fadeOut) {
				_push(`<!--[-->`);
				if (isVertical.value) _push(`<!--[--><div aria-hidden="true" class="${ssrRenderClass([
					"pointer-events-none absolute inset-x-0 top-0 z-10",
					"h-[clamp(24px,8%,120px)]",
					"bg-[linear-gradient(to_bottom,var(--logoloop-fadeColor,var(--logoloop-fadeColorAuto))_0%,rgba(0,0,0,0)_100%)]"
				])}"></div><div aria-hidden="true" class="${ssrRenderClass([
					"pointer-events-none absolute inset-x-0 bottom-0 z-10",
					"h-[clamp(24px,8%,120px)]",
					"bg-[linear-gradient(to_top,var(--logoloop-fadeColor,var(--logoloop-fadeColorAuto))_0%,rgba(0,0,0,0)_100%)]"
				])}"></div><!--]-->`);
				else _push(`<!--[--><div aria-hidden="true" class="${ssrRenderClass([
					"pointer-events-none absolute inset-y-0 left-0 z-10",
					"w-[clamp(24px,8%,120px)]",
					"bg-[linear-gradient(to_right,var(--logoloop-fadeColor,var(--logoloop-fadeColorAuto))_0%,rgba(0,0,0,0)_100%)]"
				])}"></div><div aria-hidden="true" class="${ssrRenderClass([
					"pointer-events-none absolute inset-y-0 right-0 z-10",
					"w-[clamp(24px,8%,120px)]",
					"bg-[linear-gradient(to_left,var(--logoloop-fadeColor,var(--logoloop-fadeColorAuto))_0%,rgba(0,0,0,0)_100%)]"
				])}"></div><!--]-->`);
				_push(`<!--]-->`);
			} else _push(`<!---->`);
			_push(`<div class="${ssrRenderClass([
				"flex will-change-transform select-none relative z-0",
				"motion-reduce:transform-none",
				isVertical.value ? "flex-col h-max w-full" : "flex-row w-max"
			])}"><!--[-->`);
			ssrRenderList(copyCount.value, (copyIndex) => {
				_push(`<ul class="${ssrRenderClass(["flex items-center", isVertical.value && "flex-col"])}" role="list"${ssrRenderAttr("aria-hidden", copyIndex > 1 ? true : void 0)}><!--[-->`);
				ssrRenderList(__props.logos, (item, itemIndex) => {
					_push(`<li class="${ssrRenderClass([
						"flex-none text-[length:var(--logoloop-logoHeight)] leading-[1]",
						isVertical.value ? "mb-[var(--logoloop-gap)]" : "mr-[var(--logoloop-gap)]",
						__props.scaleOnHover && "overflow-visible group/item"
					])}" role="listitem">`);
					if (_ctx.$slots.renderItem) ssrRenderSlot(_ctx.$slots, "renderItem", {
						item,
						index: `${copyIndex - 1}-${itemIndex}`
					}, null, _push, _parent);
					else {
						_push(`<!--[-->`);
						if (item.href) {
							_push(`<a class="${ssrRenderClass([
								"inline-flex items-center no-underline rounded",
								"transition-opacity duration-200 ease-linear",
								"hover:opacity-80",
								"focus-visible:outline focus-visible:outline-current focus-visible:outline-offset-2"
							])}"${ssrRenderAttr("href", item.href)}${ssrRenderAttr("aria-label", getItemAriaLabel(item) || "logo link")} target="_blank" rel="noreferrer noopener">`);
							_push(ssrRenderComponent(unref(LogoContent), {
								item,
								"scale-on-hover": __props.scaleOnHover
							}, null, _parent));
							_push(`</a>`);
						} else _push(ssrRenderComponent(unref(LogoContent), {
							item,
							"scale-on-hover": __props.scaleOnHover
						}, null, _parent));
						_push(`<!--]-->`);
					}
					_push(`</li>`);
				});
				_push(`<!--]--></ul>`);
			});
			_push(`<!--]--></div></div>`);
		};
	}
});
//#endregion
//#region resources/js/Components/Atoms/LogoLoop.vue
var _sfc_setup$1 = LogoLoop_vue_vue_type_script_setup_true_lang_default.setup;
LogoLoop_vue_vue_type_script_setup_true_lang_default.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/LogoLoop.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
var LogoLoop_default = LogoLoop_vue_vue_type_script_setup_true_lang_default;
//#endregion
//#region resources/js/Components/Organisms/Home/Companies.vue
var LOGO_REPEAT = 6;
var _sfc_main = {
	__name: "Companies",
	__ssrInlineRender: true,
	props: { companiesSection: {
		type: Object,
		required: true
	} },
	setup(__props) {
		const props = __props;
		const companyLogos = computed(() => {
			const mapped = props.companiesSection.companies.data.map((company) => ({
				src: company.logo,
				alt: company.name,
				href: company.website,
				title: company.name,
				height: 28,
				width: 28
			}));
			return Array.from({ length: LOGO_REPEAT }, () => mapped).flat();
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "mb-16 mt-12 bg-slate-100 p-4 pb-6 sm:p-6 sm:pb-8 lg:p-8 lg:pb-10" }, _attrs))}><div class="container mx-auto text-center lg:text-start"><div class="relative flex items-start justify-center lg:justify-start"><h3 class="max-w-xs text-2xl font-semibold leading-snug sm:max-w-sm sm:text-3xl lg:max-w-md lg:text-4xl">${ssrInterpolate(__props.companiesSection.content.title)} <span class="text-primary-700">${ssrInterpolate(__props.companiesSection.content.highlight)}</span> ${ssrInterpolate(__props.companiesSection.content.suffix)}</h3><img${ssrRenderAttr("src", "/assets/svg/companies.svg")} alt="" class="h-12 w-12 shrink-0 rtl:hidden sm:h-16 sm:w-16 lg:h-20 lg:w-20"><img${ssrRenderAttr("src", "/assets/svg/companies-right.svg")} alt="" class="h-12 w-12 shrink-0 ltr:hidden sm:h-16 sm:w-16 lg:h-20 lg:w-20"></div><div class="mt-8 mb-2 sm:mt-10 sm:mb-4 lg:mt-12 lg:mb-6">`);
			_push(ssrRenderComponent(LogoLoop_default, {
				logos: companyLogos.value,
				speed: 40,
				direction: "left",
				"logo-height": 28,
				gap: 64,
				"hover-speed": 15,
				"fade-out": true,
				"fade-out-color": "#f1f5f9",
				"scale-on-hover": true,
				"aria-label": "Companies I've worked with"
			}, null, _parent));
			_push(`</div></div></section>`);
		};
	}
};
var _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/Companies.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
export { _sfc_main as default };

//# sourceMappingURL=Companies-DW7fCs0a.js.map