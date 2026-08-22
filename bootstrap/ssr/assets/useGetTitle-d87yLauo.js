import { n as _plugin_vue_export_helper_default, t as Subtitle_default } from "./Subtitle-DtkDPELn.js";
import { computed, createBlock, createCommentVNode, createTextVNode, createVNode, defineComponent, mergeProps, onBeforeUnmount, onMounted, onUnmounted, openBlock, ref, renderSlot, resolveDynamicComponent, toDisplayString, unref, useSSRContext, watch, watchEffect, withCtx } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderComponent, ssrRenderList, ssrRenderSlot, ssrRenderStyle, ssrRenderVNode } from "vue/server-renderer";
import { Color, Mesh, Program, Renderer, Triangle } from "ogl";
//#region resources/js/Components/Atoms/Logo.vue
var _sfc_main$12 = {};
function _sfc_ssrRender$3(_ctx, _push, _parent, _attrs) {
	_push(`<img${ssrRenderAttrs(mergeProps({
		alt: "Logo",
		class: "h-10 w-auto",
		src: "/assets/images/logo/logo.svg"
	}, _attrs))}>`);
}
var _sfc_setup$13 = _sfc_main$12.setup;
_sfc_main$12.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Logo.vue");
	return _sfc_setup$13 ? _sfc_setup$13(props, ctx) : void 0;
};
var Logo_default = /*#__PURE__*/ _plugin_vue_export_helper_default(_sfc_main$12, [["ssrRender", _sfc_ssrRender$3]]);
//#endregion
//#region resources/js/Components/Atoms/NavLink.vue
var _sfc_main$11 = {
	__name: "NavLink",
	__ssrInlineRender: true,
	props: {
		label: {
			type: String,
			required: true
		},
		href: {
			type: String,
			required: true
		}
	},
	setup(__props) {
		const props = __props;
		const page = usePage();
		const normalizePath = (value) => {
			if (!value) return "/";
			return (value.startsWith("http") ? new URL(value) : new URL(value, window.location.origin)).pathname.replace(/\/+$/, "") || "/";
		};
		const isActive = computed(() => {
			return normalizePath(page.url) === normalizePath(props.href);
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<li${ssrRenderAttrs(mergeProps({ class: "list-none" }, _attrs))}>`);
			_push(ssrRenderComponent(unref(Link), {
				class: [isActive.value ? "active font-medium text-slate-900" : "font-light text-slate-500", "relative flex items-center space-x-4 w-full px-4 py-2 text-md underline-half transition-all duration-200"],
				href: __props.href
			}, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent, _scopeId);
						_push(`<span class="capitalize"${_scopeId}>${ssrInterpolate(__props.label)}</span>`);
					} else return [renderSlot(_ctx.$slots, "default"), createVNode("span", { class: "capitalize" }, toDisplayString(__props.label), 1)];
				}),
				_: 3
			}, _parent));
			_push(`</li>`);
		};
	}
};
var _sfc_setup$12 = _sfc_main$11.setup;
_sfc_main$11.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/NavLink.vue");
	return _sfc_setup$12 ? _sfc_setup$12(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Navbar.vue
var _sfc_main$10 = {
	__name: "Navbar",
	__ssrInlineRender: true,
	props: { navigation: {
		type: Object,
		required: true
	} },
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<nav${ssrRenderAttrs(mergeProps({ "aria-label": "Primary" }, _attrs))}><ul class="flex items-center gap-6"><!--[-->`);
			ssrRenderList(__props.navigation, (link) => {
				_push(ssrRenderComponent(_sfc_main$11, {
					key: link.route,
					href: link.route,
					label: link.label
				}, null, _parent));
			});
			_push(`<!--]--></ul></nav>`);
		};
	}
};
var _sfc_setup$11 = _sfc_main$10.setup;
_sfc_main$10.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Navbar.vue");
	return _sfc_setup$11 ? _sfc_setup$11(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/MobileMenu.vue
var _sfc_main$9 = {
	__name: "MobileMenu",
	__ssrInlineRender: true,
	props: { navigation: {
		type: Object,
		required: true
	} },
	setup(__props) {
		const modalOpen = ref(false);
		const closeMenu = () => {
			modalOpen.value = false;
		};
		watch(modalOpen, (open) => {
			if (typeof document === "undefined") return;
			document.body.style.overflow = open ? "hidden" : "";
		});
		onBeforeUnmount(() => {
			if (typeof document !== "undefined") document.body.style.overflow = "";
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({ class: "relative z-50 flex h-auto w-auto xl:hidden" }, _attrs))} data-v-6ef2af54><div class="${ssrRenderClass(["z-10000 -top-6 transition-all duration-300", modalOpen.value ? "fixed top-6 inset-e-6" : "absolute inset-e-1"])}" data-v-6ef2af54><button${ssrRenderAttr("aria-expanded", modalOpen.value)} aria-label="Toggle mobile menu" class="relative flex size-12 items-center justify-center rounded-full text-secondary-900 transition-colors duration-300 focus:outline-hidden focus:ring-0" type="button" data-v-6ef2af54><span class="${ssrRenderClass([modalOpen.value ? "rotate-45" : "-translate-y-1.5", "absolute h-0.5 w-5 rounded-full bg-current transition-all duration-300"])}" data-v-6ef2af54></span><span class="${ssrRenderClass([modalOpen.value ? "opacity-0" : "opacity-100", "absolute h-0.5 w-5 rounded-full bg-current transition-all duration-300"])}" data-v-6ef2af54></span><span class="${ssrRenderClass([modalOpen.value ? "-rotate-45" : "translate-y-1.5", "absolute h-0.5 w-5 rounded-full bg-current transition-all duration-300"])}" data-v-6ef2af54></span></button></div>`);
			if (modalOpen.value) {
				_push(`<div class="fixed inset-x-0 top-0 bottom-0 z-9999" data-v-6ef2af54><div class="mobile-menu-overlay absolute inset-0 bg-black/50" data-v-6ef2af54></div><div class="mobile-menu-panel mobile-menu-layer-white absolute inset-y-0 right-0 w-full max-w-110 bg-secondary-50" data-v-6ef2af54></div><div class="mobile-menu-panel mobile-menu-layer-red absolute inset-y-0 right-0 w-full max-w-110 bg-primary-500" data-v-6ef2af54></div><aside class="mobile-menu-panel mobile-menu-drawer absolute inset-y-0 right-0 w-full max-w-110 overflow-hidden bg-secondary-50 text-secondary-950 shadow-2xl backdrop-blur-xl pt-20" data-v-6ef2af54><div class="flex h-full flex-col overflow-y-auto px-6 py-8" data-v-6ef2af54><ul class="group space-y-4" data-v-6ef2af54><!--[-->`);
				ssrRenderList(__props.navigation, (item, index) => {
					_push(`<li class="mobile-menu-item flex items-start justify-between gap-4 border-b border-secondary-950/10 pb-4 transition-opacity duration-300 group-hover:opacity-35 hover:opacity-100!" style="${ssrRenderStyle({ "--item-index": index })}" data-v-6ef2af54><div class="min-w-0" data-v-6ef2af54><div class="mb-2 text-xs font-medium uppercase text-primary-500" data-v-6ef2af54>${ssrInterpolate(String(index + 1).padStart(2, "0"))}</div>`);
					_push(ssrRenderComponent(unref(Link), {
						href: item.route || item.href || "#",
						class: "block font-display text-xl font-semibold uppercase leading-none tracking-[-0.08em] text-secondary-950 transition-colors duration-300 hover:text-[#D4AF37]",
						onClick: closeMenu
					}, {
						default: withCtx((_, _push, _parent, _scopeId) => {
							if (_push) _push(`${ssrInterpolate(item.label || item.name)}`);
							else return [createTextVNode(toDisplayString(item.label || item.name), 1)];
						}),
						_: 2
					}, _parent));
					_push(`</div></li>`);
				});
				_push(`<!--]--></ul></div></aside></div>`);
			} else _push(`<!---->`);
			_push(`</div>`);
		};
	}
};
var _sfc_setup$10 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/MobileMenu.vue");
	return _sfc_setup$10 ? _sfc_setup$10(props, ctx) : void 0;
};
var MobileMenu_default = /*#__PURE__*/ _plugin_vue_export_helper_default(_sfc_main$9, [["__scopeId", "data-v-6ef2af54"]]);
//#endregion
//#region resources/js/Components/Organisms/TheMenu.vue
var _sfc_main$8 = {
	__name: "TheMenu",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const navigation = computed(() => page.props.navigation);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<!--[--><div class="hidden md:flex">`);
			_push(ssrRenderComponent(_sfc_main$10, {
				navigation: navigation.value,
				class: "w-full flex items-center justify-center gap-6"
			}, null, _parent));
			_push(`</div><div class="relative flex md:hidden">`);
			_push(ssrRenderComponent(MobileMenu_default, { navigation: navigation.value }, null, _parent));
			_push(`</div><!--]-->`);
		};
	}
};
var _sfc_setup$9 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/TheMenu.vue");
	return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Molecules/LangSwitch.vue
var _sfc_main$7 = {
	__name: "LangSwitch",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const locales = computed(() => page.props.locales);
		const currentLocale = computed(() => page.props.locale);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({ class: "flex items-center gap-2 rounded-full border border-slate-200 bg-white p-1" }, _attrs))}><!--[-->`);
			ssrRenderList(locales.value, (locale) => {
				_push(ssrRenderComponent(unref(Link), {
					key: locale.key,
					href: locale.url,
					class: ["rounded-full px-3 py-1 text-xs font-semibold transition-all duration-200", locale.key === currentLocale.value ? "bg-slate-900 text-white shadow-sm" : "text-slate-500 hover:bg-slate-100 hover:text-slate-900"]
				}, {
					default: withCtx((_, _push, _parent, _scopeId) => {
						if (_push) _push(`${ssrInterpolate(locale.label)}`);
						else return [createTextVNode(toDisplayString(locale.label), 1)];
					}),
					_: 2
				}, _parent));
			});
			_push(`<!--]--></div>`);
		};
	}
};
var _sfc_setup$8 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Molecules/LangSwitch.vue");
	return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Header.vue
var _sfc_main$6 = {
	__name: "Header",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		computed(() => page.props.header.content);
		const ctaLabel = computed(() => page.props.header.header_cta_label);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<header${ssrRenderAttrs(mergeProps({ class: "relative z-99 border-b border-secondary-200 py-4 md:py-6" }, _attrs))}><div class="mx-auto flex w-full max-w-8xl items-center justify-between px-6 md:px-32"><div class="shrink-0">`);
			_push(ssrRenderComponent(Logo_default, { class: "h-10 w-12" }, null, _parent));
			_push(`</div>`);
			_push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
			_push(`<div class="hidden items-center gap-4 md:flex">`);
			_push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
			_push(ssrRenderComponent(unref(Link), {
				class: "rounded-2xl border border-secondary-200 bg-slate-100 px-6 py-2 focus:outline-hidden",
				href: "/contact"
			}, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(`<span class="font-semibold text-secondary-900"${_scopeId}>${ssrInterpolate(ctaLabel.value)}</span>`);
					else return [createVNode("span", { class: "font-semibold text-secondary-900" }, toDisplayString(ctaLabel.value), 1)];
				}),
				_: 1
			}, _parent));
			_push(`</div><div class="flex items-center gap-3 md:hidden">`);
			_push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
			_push(`</div></div></header>`);
		};
	}
};
var _sfc_setup$7 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Header.vue");
	return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Icons/GithubLogo.vue
var _sfc_main$5 = {};
function _sfc_ssrRender$2(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		fill: "currentColor",
		viewBox: "0 0 256 256",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M208.31,75.68A59.78,59.78,0,0,0,202.93,28,8,8,0,0,0,196,24a59.75,59.75,0,0,0-48,24H124A59.75,59.75,0,0,0,76,24a8,8,0,0,0-6.93,4,59.78,59.78,0,0,0-5.38,47.68A58.14,58.14,0,0,0,56,104v8a56.06,56.06,0,0,0,48.44,55.47A39.8,39.8,0,0,0,96,192v8H72a24,24,0,0,1-24-24A40,40,0,0,0,8,136a8,8,0,0,0,0,16,24,24,0,0,1,24,24,40,40,0,0,0,40,40H96v16a8,8,0,0,0,16,0V192a24,24,0,0,1,48,0v40a8,8,0,0,0,16,0V192a39.8,39.8,0,0,0-8.44-24.53A56.06,56.06,0,0,0,216,112v-8A58.14,58.14,0,0,0,208.31,75.68ZM200,112a40,40,0,0,1-40,40H112a40,40,0,0,1-40-40v-8a41.74,41.74,0,0,1,6.9-22.48A8,8,0,0,0,80,73.83a43.81,43.81,0,0,1,.79-33.58,43.88,43.88,0,0,1,32.32,20.06A8,8,0,0,0,119.82,64h32.35a8,8,0,0,0,6.74-3.69,43.87,43.87,0,0,1,32.32-20.06A43.81,43.81,0,0,1,192,73.83a8.09,8.09,0,0,0,1,7.65A41.72,41.72,0,0,1,200,104Z"></path></svg>`);
}
var _sfc_setup$6 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/GithubLogo.vue");
	return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
var GithubLogo_default = /*#__PURE__*/ _plugin_vue_export_helper_default(_sfc_main$5, [["ssrRender", _sfc_ssrRender$2]]);
//#endregion
//#region resources/js/Components/Icons/InstagramLogo.vue
var _sfc_main$4 = {};
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		fill: "currentColor",
		viewBox: "0 0 256 256",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z"></path></svg>`);
}
var _sfc_setup$5 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/InstagramLogo.vue");
	return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
var InstagramLogo_default = /*#__PURE__*/ _plugin_vue_export_helper_default(_sfc_main$4, [["ssrRender", _sfc_ssrRender$1]]);
//#endregion
//#region resources/js/Components/Icons/LinkedinLogo.vue
var _sfc_main$3 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		fill: "currentColor",
		viewBox: "0 0 256 256",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M216,24H40A16,16,0,0,0,24,40V216a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V40A16,16,0,0,0,216,24Zm0,192H40V40H216V216ZM96,112v64a8,8,0,0,1-16,0V112a8,8,0,0,1,16,0Zm88,28v36a8,8,0,0,1-16,0V140a20,20,0,0,0-40,0v36a8,8,0,0,1-16,0V112a8,8,0,0,1,15.79-1.78A36,36,0,0,1,184,140ZM100,84A12,12,0,1,1,88,72,12,12,0,0,1,100,84Z"></path></svg>`);
}
var _sfc_setup$4 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/LinkedinLogo.vue");
	return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
var LinkedinLogo_default = /*#__PURE__*/ _plugin_vue_export_helper_default(_sfc_main$3, [["ssrRender", _sfc_ssrRender]]);
//#endregion
//#region resources/js/Components/Atoms/BaseButton.vue
var _sfc_main$2 = {
	__name: "BaseButton",
	__ssrInlineRender: true,
	props: {
		href: {
			type: String,
			default: null
		},
		external: {
			type: Boolean,
			default: false
		},
		rounded: {
			type: Boolean,
			default: false
		},
		circle: {
			type: Boolean,
			default: false
		},
		outline: {
			type: Boolean,
			default: false
		},
		color: {
			type: String,
			default: "primary"
		},
		icon: {
			type: String,
			default: null
		},
		position: {
			type: String,
			default: "left"
		},
		label: {
			type: String,
			default: null
		},
		type: {
			type: String,
			default: "button"
		}
	},
	setup(__props) {
		const props = __props;
		const iconMap = {
			"github-logo": GithubLogo_default,
			"instagram-logo": InstagramLogo_default,
			"linkedin-logo": LinkedinLogo_default
		};
		const iconComponent = computed(() => {
			if (!props.icon) return null;
			return iconMap[props.icon] ?? null;
		});
		const iconClasses = computed(() => props.circle ? "w-4 h-4" : "size-5");
		const iconOnRight = computed(() => props.position === "right");
		const colorClasses = computed(() => {
			if (props.color === "secondary" && props.outline) return "text-secondary-600 border-secondary-600 hover:bg-secondary-400/20 focus:ring-offset-0 focus:text-secondary-700 focus:bg-secondary-400/20 focus:ring-secondary-600 hover:text-secondary-700 dark:hover:text-secondary-500 dark:hover:bg-secondary-600/20 dark:focus:border-transparent dark:focus:text-secondary-500 dark:focus:bg-secondary-600/20 dark:focus:ring-secondary-700";
			if (props.color === "secondary") return "bg-secondary-950 text-secondary-50 hover:bg-secondary-800";
			if (props.outline) return "border border-primary-200 bg-transparent text-primary-900 hover:border-primary-300 hover:bg-secondary-400";
			return "bg-primary-600 text-secondary-50 hover:bg-primary-700";
		});
		const shapeClasses = computed(() => {
			if (props.circle) return "w-9 h-9 rounded-full";
			return ["justify-center px-4 py-2 text-sm font-medium", props.rounded ? "rounded-full" : "rounded-2xl"];
		});
		const baseClasses = computed(() => [
			props.circle ? "focus:shadow-outline group inline-flex items-center justify-center gap-x-2 rounded-full border text-sm outline-hidden transition-all duration-200 ease-in-out hover:shadow-sm focus:border-transparent focus:ring-2 focus:ring-offset-white enabled:cursor-pointer disabled:cursor-not-allowed disabled:opacity-50" : "inline-flex shrink-0 items-center gap-2 backdrop-blur-md transition-all duration-300 focus:outline-hidden focus:ring-0",
			shapeClasses.value,
			colorClasses.value
		]);
		return (_ctx, _push, _parent, _attrs) => {
			if (__props.external) {
				_push(`<a${ssrRenderAttrs(mergeProps({
					"aria-label": __props.label,
					class: baseClasses.value,
					href: __props.href,
					rel: "noopener noreferrer",
					target: "_blank"
				}, _attrs))}>`);
				if (iconComponent.value && !iconOnRight.value) ssrRenderVNode(_push, createVNode(resolveDynamicComponent(iconComponent.value), { class: iconClasses.value }, null), _parent);
				else _push(`<!---->`);
				ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
				if (iconComponent.value && iconOnRight.value) ssrRenderVNode(_push, createVNode(resolveDynamicComponent(iconComponent.value), { class: iconClasses.value }, null), _parent);
				else _push(`<!---->`);
				_push(`</a>`);
			} else if (__props.href) _push(ssrRenderComponent(unref(Link), mergeProps({
				"aria-label": __props.label,
				class: baseClasses.value,
				href: __props.href
			}, _attrs), {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						if (iconComponent.value && !iconOnRight.value) ssrRenderVNode(_push, createVNode(resolveDynamicComponent(iconComponent.value), { class: iconClasses.value }, null), _parent, _scopeId);
						else _push(`<!---->`);
						ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent, _scopeId);
						if (iconComponent.value && iconOnRight.value) ssrRenderVNode(_push, createVNode(resolveDynamicComponent(iconComponent.value), { class: iconClasses.value }, null), _parent, _scopeId);
						else _push(`<!---->`);
					} else return [
						iconComponent.value && !iconOnRight.value ? (openBlock(), createBlock(resolveDynamicComponent(iconComponent.value), {
							key: 0,
							class: iconClasses.value
						}, null, 8, ["class"])) : createCommentVNode("", true),
						renderSlot(_ctx.$slots, "default"),
						iconComponent.value && iconOnRight.value ? (openBlock(), createBlock(resolveDynamicComponent(iconComponent.value), {
							key: 1,
							class: iconClasses.value
						}, null, 8, ["class"])) : createCommentVNode("", true)
					];
				}),
				_: 3
			}, _parent));
			else {
				_push(`<button${ssrRenderAttrs(mergeProps({
					"aria-label": __props.label,
					class: baseClasses.value,
					type: __props.type
				}, _attrs))}>`);
				if (iconComponent.value && !iconOnRight.value) ssrRenderVNode(_push, createVNode(resolveDynamicComponent(iconComponent.value), { class: iconClasses.value }, null), _parent);
				else _push(`<!---->`);
				ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
				if (iconComponent.value && iconOnRight.value) ssrRenderVNode(_push, createVNode(resolveDynamicComponent(iconComponent.value), { class: iconClasses.value }, null), _parent);
				else _push(`<!---->`);
				_push(`</button>`);
			}
		};
	}
};
var _sfc_setup$3 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/BaseButton.vue");
	return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Atoms/SpecularButton.vue?vue&type=script&setup=true&lang.ts
var PAD = 20;
var VERT = `#version 300 es
in vec2 position;
void main() {
  gl_Position = vec4(position, 0.0, 1.0);
}
`;
var FRAG = `#version 300 es
precision highp float;

uniform vec2 uCenter;
uniform vec2 uHalfSize;
uniform float uRadius;
uniform float uAngle;
uniform float uPx;
uniform vec3 uLineColor;
uniform vec3 uBaseColor;
uniform float uIntensity;
uniform float uShineSize;
uniform float uShineFade;
uniform float uThickness;
uniform float uBaseWidth;

out vec4 fragColor;

float sdRoundedRect(vec2 p, vec2 b, float r) {
  vec2 q = abs(p) - b + r;
  return length(max(q, 0.0)) + min(max(q.x, q.y), 0.0) - r;
}

float shapeSDF(vec2 p) { return sdRoundedRect(p, uHalfSize, uRadius); }

float gaussianLine(float d, float sigma) {
  float x = d / (sigma + 1e-6);
  float k = mix(1.0, 1.6, smoothstep(0.0, 1.5, x));
  return exp(-k * x * x);
}

void main() {
  vec2 p = gl_FragCoord.xy - uCenter;
  float d = shapeSDF(p);
  vec2 L = vec2(cos(uAngle), sin(uAngle));

  float base = (1.0 - smoothstep(0.0, uBaseWidth, abs(d))) * 0.45;

  vec2 nEll = normalize(p / (uHalfSize * uHalfSize) + 1e-6);
  float phi = acos(clamp(abs(dot(nEll, L)), 0.0, 1.0));
  float rim = 1.0 - smoothstep(uShineSize - uShineFade, uShineSize + uShineFade + 1e-4, phi);
  float line = gaussianLine(d, uThickness);
  float edgeClamp = 1.0 - smoothstep(0.5 * uPx, 3.0 * uPx, abs(d));
  float hi = line * rim * edgeClamp * uIntensity;

  vec3 col = uBaseColor * base + uLineColor * hi;
  float a = clamp(base + hi, 0.0, 1.0);
  fragColor = vec4(col, a);
}
`;
var SpecularButton_vue_vue_type_script_setup_true_lang_default = /*@__PURE__*/ defineComponent({
	__name: "SpecularButton",
	__ssrInlineRender: true,
	props: {
		size: { default: "lg" },
		radius: { default: 18 },
		tint: { default: "#ffffff" },
		tintOpacity: { default: 0 },
		blur: { default: 0 },
		textColor: { default: "#f5f5f5" },
		lineColor: { default: "#ffffff" },
		baseColor: { default: "#525252" },
		intensity: { default: 1 },
		shineSize: { default: 10 },
		shineFade: { default: 40 },
		thickness: { default: 1 },
		speed: { default: .35 },
		followMouse: {
			type: Boolean,
			default: true
		},
		proximity: { default: 250 },
		autoAnimate: {
			type: Boolean,
			default: false
		},
		disabled: {
			type: Boolean,
			default: false
		},
		type: { default: "button" }
	},
	setup(__props) {
		const SIZES = {
			sm: "text-[0.85rem] px-[22px] py-[10px]",
			md: "text-[1rem] px-[30px] py-[14px]",
			lg: "text-[1.15rem] px-10 py-[18px]"
		};
		const props = __props;
		const btnRef = ref(null);
		const fxRef = ref(null);
		const sizeClass = computed(() => SIZES[props.size] || SIZES.md);
		const buttonStyle = computed(() => ({
			"--sb-radius": `${props.radius}px`,
			"--sb-tint": props.tint,
			"--sb-tint-opacity": String(props.tintOpacity),
			"--sb-blur": `${props.blur}px`,
			"--sb-text-color": props.textColor
		}));
		let _cancelRaf = null;
		let _disconnect = null;
		let _removePointer = null;
		let _destroyGl = null;
		onUnmounted(() => {
			_cancelRaf?.();
			_disconnect?.();
			_removePointer?.();
			_destroyGl?.();
		});
		onMounted(() => {
			const btn = btnRef.value;
			const fx = fxRef.value;
			if (!btn || !fx) return;
			const dpr = window.devicePixelRatio || 1;
			const renderer = new Renderer({
				alpha: true,
				premultipliedAlpha: true,
				antialias: true,
				dpr
			});
			const gl = renderer.gl;
			gl.clearColor(0, 0, 0, 0);
			gl.enable(gl.BLEND);
			gl.blendFunc(gl.ONE, gl.ONE_MINUS_SRC_ALPHA);
			const geometry = new Triangle(gl);
			if (geometry.attributes.uv) delete geometry.attributes.uv;
			const program = new Program(gl, {
				vertex: VERT,
				fragment: FRAG,
				uniforms: {
					uCenter: { value: [0, 0] },
					uHalfSize: { value: [1, 1] },
					uRadius: { value: 0 },
					uAngle: { value: 2.4 },
					uPx: { value: dpr },
					uLineColor: { value: [
						1,
						1,
						1
					] },
					uBaseColor: { value: [
						.32,
						.32,
						.32
					] },
					uIntensity: { value: 1 },
					uShineSize: { value: .17 },
					uShineFade: { value: .7 },
					uThickness: { value: 1 },
					uBaseWidth: { value: dpr }
				}
			});
			const mesh = new Mesh(gl, {
				geometry,
				program
			});
			const canvas = gl.canvas;
			canvas.style.display = "block";
			canvas.style.width = "100%";
			canvas.style.height = "100%";
			fx.appendChild(canvas);
			const sizeRef = {
				w: 1,
				h: 1
			};
			const resize = () => {
				const rect = btn.getBoundingClientRect();
				const w = rect.width;
				const h = rect.height;
				sizeRef.w = w;
				sizeRef.h = h;
				renderer.setSize(w + 40, h + 40);
				program.uniforms.uCenter.value = [(PAD + w / 2) * dpr, (PAD + h / 2) * dpr];
				program.uniforms.uHalfSize.value = [w / 2 * dpr, h / 2 * dpr];
			};
			const ro = new ResizeObserver(resize);
			ro.observe(btn);
			resize();
			let pointerAngle = null;
			let proximityT = 0;
			const onPointerMove = (e) => {
				const rect = btn.getBoundingClientRect();
				const cx = rect.left + rect.width / 2;
				const cy = rect.top + rect.height / 2;
				const dx = Math.max(rect.left - e.clientX, 0, e.clientX - rect.right);
				const dy = Math.max(rect.top - e.clientY, 0, e.clientY - rect.bottom);
				const dist = Math.hypot(dx, dy);
				if (dist === 0) {
					const nx = (e.clientX - cx) / (rect.width / 2);
					const ny = (cy - e.clientY) / (rect.height / 2);
					pointerAngle = Math.atan2(2 / rect.height, -2 / rect.width) + nx * .3 + ny * .15;
				} else pointerAngle = Math.atan2(cy - e.clientY, e.clientX - cx);
				const t = Math.max(0, 1 - dist / Math.max(props.proximity, 1));
				proximityT = t * t * (3 - 2 * t);
			};
			window.addEventListener("pointermove", onPointerMove);
			let angle = 2.4;
			let idleAngle = 2.4;
			let bright = 0;
			let last = performance.now();
			let raf = 0;
			const lineC = new Color();
			const baseC = new Color();
			const update = (now) => {
				raf = requestAnimationFrame(update);
				const dt = Math.min((now - last) / 1e3, .05);
				last = now;
				idleAngle += props.speed * dt;
				const diff = ((props.followMouse && pointerAngle != null && (!props.autoAnimate || proximityT > 0) ? pointerAngle : idleAngle) - angle + Math.PI * 3) % (Math.PI * 2) - Math.PI;
				angle += diff * (1 - Math.exp(-dt * 7));
				const brightTarget = props.autoAnimate ? 1 : proximityT;
				bright += (brightTarget - bright) * (1 - Math.exp(-dt * 8));
				lineC.set(props.lineColor);
				baseC.set(props.baseColor);
				program.uniforms.uAngle.value = angle;
				program.uniforms.uRadius.value = Math.min(props.radius, Math.min(sizeRef.w, sizeRef.h) / 2) * dpr;
				program.uniforms.uLineColor.value = [
					lineC.r,
					lineC.g,
					lineC.b
				];
				program.uniforms.uBaseColor.value = [
					baseC.r,
					baseC.g,
					baseC.b
				];
				program.uniforms.uIntensity.value = props.intensity * bright;
				program.uniforms.uShineSize.value = props.shineSize * Math.PI / 180;
				program.uniforms.uShineFade.value = props.shineFade * Math.PI / 180;
				program.uniforms.uThickness.value = props.thickness * dpr;
				renderer.render({ scene: mesh });
			};
			raf = requestAnimationFrame(update);
			_cancelRaf = () => cancelAnimationFrame(raf);
			_disconnect = () => ro.disconnect();
			_removePointer = () => window.removeEventListener("pointermove", onPointerMove);
			_destroyGl = () => {
				if (canvas.parentNode === fx) fx.removeChild(canvas);
				gl.getExtension("WEBGL_lose_context")?.loseContext();
			};
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<button${ssrRenderAttrs(mergeProps({
				ref_key: "btnRef",
				ref: btnRef,
				type: __props.type,
				disabled: __props.disabled,
				class: [
					"relative m-0 inline-flex cursor-pointer items-center justify-center border-none font-medium leading-none tracking-[0.01em] outline-none transition-transform duration-150 active:scale-[0.97] disabled:cursor-default disabled:opacity-55 disabled:active:scale-100",
					"rounded-(--sb-radius)",
					"[background:color-mix(in_srgb,var(--sb-tint)_calc(var(--sb-tint-opacity)*100%),transparent)]",
					"[backdrop-filter:blur(var(--sb-blur))]",
					"shadow-[inset_0_1px_0_rgba(255,255,255,0.04),0_8px_24px_rgba(0,0,0,0.25)]",
					"focus-visible:outline-2 focus-visible:outline-offset-[3px]",
					sizeClass.value
				],
				style: [buttonStyle.value, { color: props.textColor }]
			}, _attrs))}><span aria-hidden="true" style="${ssrRenderStyle({
				"position": "absolute",
				"inset": "-20px",
				"z-index": "1",
				"pointer-events": "none"
			})}"></span><span style="${ssrRenderStyle({
				"position": "relative",
				"z-index": "2"
			})}">`);
			ssrRenderSlot(_ctx.$slots, "default", {}, () => {
				_push(`Get Started`);
			}, _push, _parent);
			_push(`</span></button>`);
		};
	}
});
//#endregion
//#region resources/js/Components/Atoms/SpecularButton.vue
var _sfc_setup$2 = SpecularButton_vue_vue_type_script_setup_true_lang_default.setup;
SpecularButton_vue_vue_type_script_setup_true_lang_default.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/SpecularButton.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
var SpecularButton_default = SpecularButton_vue_vue_type_script_setup_true_lang_default;
//#endregion
//#region resources/js/Components/Organisms/Footer.vue
var _sfc_main$1 = {
	__name: "Footer",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const footer = computed(() => page.props.footer);
		const socials = computed(() => page.props.socials);
		const navigation = computed(() => page.props.footerNavigation);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<footer${ssrRenderAttrs(mergeProps({ class: "bg-slate-900 py-10 sm:pt-16 lg:pt-24" }, _attrs))}><div class="mx-auto max-w-7xl px-4 sm:px-12 lg:px-8"><div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-32"><div class="space-y-16">`);
			_push(ssrRenderComponent(Subtitle_default, { class: "text-start text-white" }, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(`${ssrInterpolate(footer.value.title)}`);
					else return [createTextVNode(toDisplayString(footer.value.title), 1)];
				}),
				_: 1
			}, _parent));
			_push(`<div class="flex justify-start"><a href="/contact">`);
			_push(ssrRenderComponent(SpecularButton_default, {
				"auto-animate": false,
				blur: 0,
				intensity: 1.5,
				proximity: 280,
				radius: 14,
				"shine-fade": 38,
				"shine-size": 12,
				speed: .35,
				thickness: 1,
				"tint-opacity": 1,
				"base-color": "#0c635a",
				"follow-mouse": "",
				"line-color": "#21e0c0",
				size: "md",
				"text-color": "#030712",
				tint: "#ffffff"
			}, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(`<span class="relative font-medium"${_scopeId}>${ssrInterpolate(footer.value.button_label)}</span>`);
					else return [createVNode("span", { class: "relative font-medium" }, toDisplayString(footer.value.button_label), 1)];
				}),
				_: 1
			}, _parent));
			_push(`</a></div></div><div class="flex flex-col space-y-10"><p class="mt-4 inline-flex pe-32 text-start text-secondary-100">${ssrInterpolate(footer.value.description)}</p><div class="flex flex-wrap gap-4"><!--[-->`);
			ssrRenderList(socials.value, (social) => {
				_push(ssrRenderComponent(_sfc_main$2, {
					key: social.name,
					href: social.link,
					icon: social.icon,
					label: social.name,
					class: "bg-transparent backdrop-blur-md border border-white/10 text-secondary-50 hover:bg-secondary-700",
					external: "",
					position: "right",
					rounded: ""
				}, {
					default: withCtx((_, _push, _parent, _scopeId) => {
						if (_push) _push(`${ssrInterpolate(social.name)}`);
						else return [createTextVNode(toDisplayString(social.name), 1)];
					}),
					_: 2
				}, _parent));
			});
			_push(`<!--]--></div></div></div><hr class="mb-10 mt-16 border-secondary-200/10"><div class="flex flex-col gap-4 md:flex-row md:justify-between"><div class="flex w-full flex-wrap items-center gap-4"><!--[-->`);
			ssrRenderList(navigation.value, (link) => {
				_push(ssrRenderComponent(unref(Link), {
					key: link.route,
					href: link.route,
					class: "py-2 text-md font-light text-secondary-100 transition hover:text-white"
				}, {
					default: withCtx((_, _push, _parent, _scopeId) => {
						if (_push) _push(`${ssrInterpolate(link.label)}`);
						else return [createTextVNode(toDisplayString(link.label), 1)];
					}),
					_: 2
				}, _parent));
			});
			_push(`<!--]--></div><p class="block w-full text-end text-sm text-secondary-300">${ssrInterpolate(footer.value.copyright)}</p></div></div></footer>`);
		};
	}
};
var _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Footer.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Layouts/AppLayout.vue
var _sfc_main = {
	__name: "AppLayout",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const languageTag = computed(() => page.props.languageTag ?? "en");
		const direction = computed(() => page.props.direction ?? "ltr");
		watchEffect(() => {
			if (typeof document === "undefined") return;
			document.documentElement.lang = languageTag.value;
			document.documentElement.dir = direction.value;
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<!--[--><div class="flex flex-col w-full min-h-screen overflow-hidden bg-slate-50 text-secondary-900">`);
			_push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
			_push(`<main class="grow">`);
			ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
			_push(`</main></div>`);
			_push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
			_push(`<!--]-->`);
		};
	}
};
var _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Layouts/AppLayout.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Composables/useGetTitle.js
function useGetTitle(page) {
	return usePage().props.pages[page];
}
//#endregion
export { _sfc_main$2 as i, _sfc_main as n, SpecularButton_default as r, useGetTitle as t };

//# sourceMappingURL=useGetTitle-d87yLauo.js.map