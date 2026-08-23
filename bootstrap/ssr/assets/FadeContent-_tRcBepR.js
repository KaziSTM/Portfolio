import { computed, createBlock, createVNode, defineComponent, mergeProps, onMounted, onUnmounted, openBlock, ref, toDisplayString, unref, useSSRContext, useTemplateRef, watch, withCtx } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttrs, ssrRenderComponent, ssrRenderSlot, ssrRenderStyle } from "vue/server-renderer";
//#region resources/js/Components/Atoms/BorderGlow.vue?vue&type=script&setup=true&lang.ts
var BorderGlow_vue_vue_type_script_setup_true_lang_default = /*@__PURE__*/ defineComponent({
	__name: "BorderGlow",
	__ssrInlineRender: true,
	props: {
		className: { default: "" },
		edgeSensitivity: { default: 30 },
		glowColor: { default: "171 85 45" },
		backgroundColor: { default: "#060010" },
		borderRadius: { default: 28 },
		glowRadius: { default: 40 },
		glowIntensity: { default: 1 },
		coneSpread: { default: 25 },
		animated: {
			type: Boolean,
			default: false
		},
		colors: { default: () => [
			"#54f4d4",
			"#21e0c0",
			"#08b89d"
		] },
		fillOpacity: { default: .5 },
		cardShadow: { default: "0 2px 8px var(--color-secondary-200, #e2e8f0), 0 1px 3px var(--color-secondary-300, #cbd5e1)" },
		disableOuterGlow: {
			type: Boolean,
			default: false
		}
	},
	setup(__props) {
		function parseHSL(hslStr) {
			const match = hslStr.match(/([\d.]+)\s*([\d.]+)%?\s*([\d.]+)%?/);
			if (!match) return {
				h: 171,
				s: 85,
				l: 45
			};
			return {
				h: parseFloat(match[1]),
				s: parseFloat(match[2]),
				l: parseFloat(match[3])
			};
		}
		function buildBoxShadow(glowColor, intensity) {
			const { h, s, l } = parseHSL(glowColor);
			const base = `${h}deg ${s}% ${l}%`;
			return [
				[
					0,
					0,
					0,
					1,
					100,
					true
				],
				[
					0,
					0,
					1,
					0,
					60,
					true
				],
				[
					0,
					0,
					3,
					0,
					50,
					true
				],
				[
					0,
					0,
					6,
					0,
					40,
					true
				],
				[
					0,
					0,
					15,
					0,
					30,
					true
				],
				[
					0,
					0,
					25,
					2,
					20,
					true
				],
				[
					0,
					0,
					50,
					2,
					10,
					true
				],
				[
					0,
					0,
					1,
					0,
					60,
					false
				],
				[
					0,
					0,
					3,
					0,
					50,
					false
				],
				[
					0,
					0,
					6,
					0,
					40,
					false
				],
				[
					0,
					0,
					15,
					0,
					30,
					false
				],
				[
					0,
					0,
					25,
					2,
					20,
					false
				],
				[
					0,
					0,
					50,
					2,
					10,
					false
				]
			].map(([x, y, blur, spread, alpha, inset]) => {
				const a = Math.min(alpha * intensity, 100);
				return `${inset ? "inset " : ""}${x}px ${y}px ${blur}px ${spread}px hsl(${base} / ${a}%)`;
			}).join(", ");
		}
		function easeOutCubic(x) {
			return 1 - Math.pow(1 - x, 3);
		}
		function easeInCubic(x) {
			return x * x * x;
		}
		function animateValue({ start = 0, end = 100, duration = 1e3, delay = 0, ease = easeOutCubic, onUpdate, onEnd }) {
			const t0 = performance.now() + delay;
			function tick() {
				const elapsed = performance.now() - t0;
				const t = Math.min(elapsed / duration, 1);
				onUpdate(start + (end - start) * ease(t));
				if (t < 1) requestAnimationFrame(tick);
				else if (onEnd) onEnd();
			}
			setTimeout(() => requestAnimationFrame(tick), delay);
		}
		const GRADIENT_POSITIONS = [
			"80% 55%",
			"69% 34%",
			"8% 6%",
			"41% 38%",
			"86% 85%",
			"82% 18%",
			"51% 4%"
		];
		const COLOR_MAP = [
			0,
			1,
			2,
			0,
			1,
			2,
			1
		];
		function buildMeshGradients(colors) {
			const gradients = [];
			for (let i = 0; i < 7; i++) {
				const c = colors[Math.min(COLOR_MAP[i], colors.length - 1)];
				gradients.push(`radial-gradient(at ${GRADIENT_POSITIONS[i]}, ${c} 0px, transparent 50%)`);
			}
			gradients.push(`linear-gradient(${colors[0]} 0 100%)`);
			return gradients;
		}
		const props = __props;
		const cardRef = useTemplateRef("cardRef");
		const isHovered = ref(false);
		const cursorAngle = ref(45);
		const edgeProximity = ref(0);
		const sweepActive = ref(false);
		watch(() => [props.animated], () => {
			if (!props.animated) return;
			const angleStart = 110;
			sweepActive.value = true;
			cursorAngle.value = angleStart;
			animateValue({
				duration: 500,
				onUpdate: (v) => edgeProximity.value = v / 100
			});
			animateValue({
				ease: easeInCubic,
				duration: 1500,
				end: 50,
				onUpdate: (v) => {
					cursorAngle.value = 355 * (v / 100) + angleStart;
				}
			});
			animateValue({
				ease: easeOutCubic,
				delay: 1500,
				duration: 2250,
				start: 50,
				end: 100,
				onUpdate: (v) => {
					cursorAngle.value = 355 * (v / 100) + angleStart;
				}
			});
			animateValue({
				ease: easeInCubic,
				delay: 2500,
				duration: 1500,
				start: 100,
				end: 0,
				onUpdate: (v) => edgeProximity.value = v / 100,
				onEnd: () => sweepActive.value = false
			});
		}, {
			deep: true,
			immediate: true
		});
		const colorSensitivity = computed(() => props.edgeSensitivity + 20);
		const isVisible = computed(() => isHovered.value || sweepActive.value);
		const borderOpacity = computed(() => isVisible.value ? Math.max(0, (edgeProximity.value * 100 - colorSensitivity.value) / (100 - colorSensitivity.value)) : 0);
		const glowOpacity = computed(() => isVisible.value ? Math.max(0, (edgeProximity.value * 100 - props.edgeSensitivity) / (100 - props.edgeSensitivity)) : 0);
		const meshGradients = computed(() => buildMeshGradients(props.colors));
		const borderBg = computed(() => meshGradients.value.map((g) => `${g} border-box`));
		const fillBg = computed(() => meshGradients.value.map((g) => `${g} padding-box`));
		const angleDeg = computed(() => `${cursorAngle.value.toFixed(3)}deg`);
		const formattedBorderRadius = computed(() => typeof props.borderRadius === "number" ? `${props.borderRadius}px` : props.borderRadius);
		const outerBorderRadius = computed(() => {
			const r = props.borderRadius;
			const glow = props.glowRadius;
			if (typeof r === "number") return `${r + glow}px`;
			return r.trim().split(/\s+/).map((p) => `calc(${p} + ${glow}px)`).join(" ");
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({
				ref_key: "cardRef",
				ref: cardRef,
				class: `relative grid isolate border border-slate-200/60 ${props.className}`,
				style: {
					background: props.backgroundColor,
					borderRadius: formattedBorderRadius.value,
					transform: "translate3d(0, 0, 0.01px)",
					boxShadow: props.cardShadow
				}
			}, _attrs))}><div class="-z-[1] absolute inset-0" style="${ssrRenderStyle({
				borderRadius: formattedBorderRadius.value,
				border: "1px solid transparent",
				background: [
					`linear-gradient(${props.backgroundColor} 0 100%) padding-box`,
					"linear-gradient(rgb(255 255 255 / 0%) 0% 100%) border-box",
					...borderBg.value
				].join(", "),
				opacity: borderOpacity.value,
				maskImage: `conic-gradient(from ${angleDeg.value} at center, black ${props.coneSpread}%, transparent ${props.coneSpread + 15}%, transparent ${100 - props.coneSpread - 15}%, black ${100 - props.coneSpread}%)`,
				WebkitMaskImage: `conic-gradient(from ${angleDeg.value} at center, black ${props.coneSpread}%, transparent ${props.coneSpread + 15}%, transparent ${100 - props.coneSpread - 15}%, black ${100 - props.coneSpread}%)`,
				transition: isVisible.value ? "opacity 0.25s ease-out" : "opacity 0.75s ease-in-out"
			})}"></div><div class="-z-[1] absolute inset-0" style="${ssrRenderStyle({
				borderRadius: formattedBorderRadius.value,
				border: "1px solid transparent",
				background: fillBg.value.join(", "),
				maskImage: [
					"linear-gradient(to bottom, black, black)",
					"radial-gradient(ellipse at 50% 50%, black 40%, transparent 65%)",
					"radial-gradient(ellipse at 66% 66%, black 5%, transparent 40%)",
					"radial-gradient(ellipse at 33% 33%, black 5%, transparent 40%)",
					"radial-gradient(ellipse at 33% 33%, black 5%, transparent 40%)",
					"radial-gradient(ellipse at 66% 33%, black 5%, transparent 40%)",
					"radial-gradient(ellipse at 33% 66%, black 5%, transparent 40%)",
					`conic-gradient(from ${angleDeg.value} at center, transparent 5%, black 15%, black 85%, transparent 95%)`
				].join(", "),
				WebkitMaskImage: [
					"linear-gradient(to bottom, black, black)",
					"radial-gradient(ellipse at 50% 50%, black 40%, transparent 65%)",
					"radial-gradient(ellipse at 66% 66%, black 5%, transparent 40%)",
					"radial-gradient(ellipse at 33% 33%, black 5%, transparent 40%)",
					"radial-gradient(ellipse at 33% 33%, black 5%, transparent 40%)",
					"radial-gradient(ellipse at 66% 33%, black 5%, transparent 40%)",
					"radial-gradient(ellipse at 33% 66%, black 5%, transparent 40%)",
					`conic-gradient(from ${angleDeg.value} at center, transparent 5%, black 15%, black 85%, transparent 95%)`
				].join(", "),
				maskComposite: "subtract, add, add, add, add, add",
				WebkitMaskComposite: "source-out, source-over, source-over, source-over, source-over, source-over",
				opacity: borderOpacity.value * props.fillOpacity,
				mixBlendMode: "soft-light",
				transition: isVisible.value ? "opacity 0.25s ease-out" : "opacity 0.75s ease-in-out"
			})}"></div>`);
			if (!props.disableOuterGlow) _push(`<span class="z-[1] absolute pointer-events-none" style="${ssrRenderStyle({
				inset: `-${props.glowRadius}px`,
				clipPath: `inset(0 round ${outerBorderRadius.value})`,
				maskImage: `conic-gradient(from ${angleDeg.value} at center, black 2.5%, transparent 10%, transparent 90%, black 97.5%)`,
				WebkitMaskImage: `conic-gradient(from ${angleDeg.value} at center, black 2.5%, transparent 10%, transparent 90%, black 97.5%)`,
				opacity: glowOpacity.value,
				mixBlendMode: "plus-lighter",
				transition: isVisible.value ? "opacity 0.25s ease-out" : "opacity 0.75s ease-in-out"
			})}"><span class="absolute" style="${ssrRenderStyle({
				inset: `${props.glowRadius}px`,
				borderRadius: formattedBorderRadius.value,
				boxShadow: buildBoxShadow(props.glowColor, props.glowIntensity)
			})}"></span></span>`);
			else _push(`<!---->`);
			_push(`<div class="z-[1] relative flex flex-col overflow-hidden h-full w-full" style="${ssrRenderStyle({ borderRadius: formattedBorderRadius.value })}">`);
			ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
			_push(`</div></div>`);
		};
	}
});
//#endregion
//#region resources/js/Components/Atoms/BorderGlow.vue
var _sfc_setup$2 = BorderGlow_vue_vue_type_script_setup_true_lang_default.setup;
BorderGlow_vue_vue_type_script_setup_true_lang_default.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/BorderGlow.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
var BorderGlow_default = BorderGlow_vue_vue_type_script_setup_true_lang_default;
//#endregion
//#region resources/js/Components/Atoms/Cta.vue
var _sfc_main = {
	__name: "Cta",
	__ssrInlineRender: true,
	props: {
		projectId: {
			type: [String, Number],
			required: true
		},
		isPackage: {
			type: Boolean,
			default: false
		},
		projectTitle: {
			type: String,
			required: true
		},
		url: {
			type: String,
			required: true
		},
		translations: {
			type: Object,
			required: true
		},
		hasBorder: {
			type: Boolean,
			default: true
		},
		plain: {
			type: Boolean,
			default: false
		}
	},
	setup(__props) {
		const props = __props;
		usePage();
		const label = computed(() => {
			return props.isPackage ? props.translations.view_package : props.translations.view_case_study;
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({ class: "z-50" }, _attrs))}>`);
			_push(ssrRenderComponent(unref(Link), {
				"aria-label": `${label.value}: ${__props.projectTitle}`,
				href: __props.url,
				class: [__props.plain ? "group inline-flex items-center gap-2 text-sm font-semibold text-primary-700 transition-all duration-300 hover:text-primary-800" : "group inline-flex items-center gap-2 rounded-full bg-secondary-50 px-5 py-2.5 text-sm font-semibold text-primary-700 transition-all duration-300 hover:bg-secondary-100 hover:scale-[1.02] active:scale-[0.98]", !__props.plain && __props.hasBorder ? "shadow-xs border border-secondary-200/60 hover:shadow-md" : ""],
				target: "_blank"
			}, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(`<span${_scopeId}>${ssrInterpolate(label.value)}</span><svg class="h-4 w-4 transform transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"${_scopeId}><path d="M7 17L17 7M17 7H8M17 7V16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"${_scopeId}></path></svg>`);
					else return [createVNode("span", { textContent: toDisplayString(label.value) }, null, 8, ["textContent"]), (openBlock(), createBlock("svg", {
						class: "h-4 w-4 transform transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5",
						fill: "none",
						stroke: "currentColor",
						viewBox: "0 0 24 24"
					}, [createVNode("path", {
						d: "M7 17L17 7M17 7H8M17 7V16",
						"stroke-linecap": "round",
						"stroke-linejoin": "round",
						"stroke-width": "2"
					})]))];
				}),
				_: 1
			}, _parent));
			_push(`</div>`);
		};
	}
};
var _sfc_setup$1 = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Cta.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Molecules/FadeContent.vue?vue&type=script&setup=true&lang.ts
var FadeContent_vue_vue_type_script_setup_true_lang_default = /*@__PURE__*/ defineComponent({
	__name: "FadeContent",
	__ssrInlineRender: true,
	props: {
		blur: {
			type: Boolean,
			default: false
		},
		duration: { default: 1e3 },
		easing: { default: "ease-out" },
		delay: { default: 0 },
		threshold: { default: .1 },
		initialOpacity: { default: 0 },
		className: { default: "" }
	},
	setup(__props) {
		const props = __props;
		const inView = ref(false);
		const elementRef = useTemplateRef("elementRef");
		let observer = null;
		onMounted(() => {
			const element = elementRef.value;
			if (!element) return;
			observer = new IntersectionObserver(([entry]) => {
				if (entry.isIntersecting) {
					observer?.unobserve(element);
					setTimeout(() => {
						inView.value = true;
					}, props.delay);
				}
			}, { threshold: props.threshold });
			observer.observe(element);
		});
		onUnmounted(() => {
			if (observer) observer.disconnect();
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({
				ref_key: "elementRef",
				ref: elementRef,
				class: __props.className,
				style: {
					opacity: inView.value ? 1 : __props.initialOpacity,
					transition: `opacity ${__props.duration}ms ${__props.easing}, filter ${__props.duration}ms ${__props.easing}`,
					filter: __props.blur ? inView.value ? "blur(0px)" : "blur(10px)" : "none"
				}
			}, _attrs))}>`);
			ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
			_push(`</div>`);
		};
	}
});
//#endregion
//#region resources/js/Components/Molecules/FadeContent.vue
var _sfc_setup = FadeContent_vue_vue_type_script_setup_true_lang_default.setup;
FadeContent_vue_vue_type_script_setup_true_lang_default.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Molecules/FadeContent.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
var FadeContent_default = FadeContent_vue_vue_type_script_setup_true_lang_default;
//#endregion
export { _sfc_main as n, BorderGlow_default as r, FadeContent_default as t };

//# sourceMappingURL=FadeContent-_tRcBepR.js.map