import { computed, createBlock, createVNode, defineComponent, mergeProps, onMounted, onUnmounted, openBlock, ref, toDisplayString, unref, useSSRContext, useTemplateRef, withCtx } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttrs, ssrRenderComponent, ssrRenderSlot } from "vue/server-renderer";
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
		}
	},
	setup(__props) {
		const props = __props;
		const page = usePage();
		const translations = computed(() => {
			return page.props.translations.actions;
		});
		const label = computed(() => {
			return props.isPackage ? translations.value.view_package : translations.value.view_case_study;
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({ class: "z-50" }, _attrs))}>`);
			_push(ssrRenderComponent(unref(Link), {
				"aria-label": `${label.value}: ${__props.projectTitle}`,
				href: __props.url,
				class: "group flex items-center space-x-2 text-sm font-medium text-primary-700",
				target: "_blank"
			}, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(`<span${_scopeId}>${ssrInterpolate(label.value)}</span><svg class="h-4 w-4 transform transition-transform duration-300 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"${_scopeId}><path d="M7 17L17 7M17 7H8M17 7V16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"${_scopeId}></path></svg>`);
					else return [createVNode("span", { textContent: toDisplayString(label.value) }, null, 8, ["textContent"]), (openBlock(), createBlock("svg", {
						class: "h-4 w-4 transform transition-transform duration-300 group-hover:-translate-y-0.5",
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
var FadeContent_vue_vue_type_script_setup_true_lang_default = /* @__PURE__ */ defineComponent({
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
export { _sfc_main as n, FadeContent_default as t };

//# sourceMappingURL=FadeContent-BIRVTgEr.js.map