import { n as _plugin_vue_export_helper_default, t as Subtitle_default } from "./Subtitle-C1PpTYqM.js";
import { computed, createBlock, createCommentVNode, createTextVNode, createVNode, mergeProps, onBeforeUnmount, openBlock, ref, renderSlot, resolveDynamicComponent, toDisplayString, unref, useSSRContext, watch, watchEffect, withCtx } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderComponent, ssrRenderList, ssrRenderSlot, ssrRenderStyle, ssrRenderVNode } from "vue/server-renderer";
//#region resources/js/Components/Atoms/Logo.vue
var _sfc_main$13 = {};
function _sfc_ssrRender$4(_ctx, _push, _parent, _attrs) {
	_push(`<img${ssrRenderAttrs(mergeProps({
		alt: "Logo",
		class: "h-10 w-auto",
		src: "/assets/images/logo/logo.svg"
	}, _attrs))}>`);
}
var _sfc_setup$13 = _sfc_main$13.setup;
_sfc_main$13.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Logo.vue");
	return _sfc_setup$13 ? _sfc_setup$13(props, ctx) : void 0;
};
var Logo_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$13, [["ssrRender", _sfc_ssrRender$4]]);
//#endregion
//#region resources/js/Components/Atoms/NavLink.vue
var _sfc_main$12 = {
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
var _sfc_setup$12 = _sfc_main$12.setup;
_sfc_main$12.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/NavLink.vue");
	return _sfc_setup$12 ? _sfc_setup$12(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Navbar.vue
var _sfc_main$11 = {
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
				_push(ssrRenderComponent(_sfc_main$12, {
					key: link.route,
					href: link.route,
					label: link.label
				}, null, _parent));
			});
			_push(`<!--]--></ul></nav>`);
		};
	}
};
var _sfc_setup$11 = _sfc_main$11.setup;
_sfc_main$11.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Navbar.vue");
	return _sfc_setup$11 ? _sfc_setup$11(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/MobileMenu.vue
var _sfc_main$10 = {
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
var _sfc_setup$10 = _sfc_main$10.setup;
_sfc_main$10.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/MobileMenu.vue");
	return _sfc_setup$10 ? _sfc_setup$10(props, ctx) : void 0;
};
var MobileMenu_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$10, [["__scopeId", "data-v-6ef2af54"]]);
//#endregion
//#region resources/js/Components/Organisms/TheMenu.vue
var _sfc_main$9 = {
	__name: "TheMenu",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const navigation = computed(() => page.props.navigation);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<!--[--><div class="hidden md:flex">`);
			_push(ssrRenderComponent(_sfc_main$11, {
				navigation: navigation.value,
				class: "w-full flex items-center justify-center gap-6"
			}, null, _parent));
			_push(`</div><div class="relative flex md:hidden">`);
			_push(ssrRenderComponent(MobileMenu_default, { navigation: navigation.value }, null, _parent));
			_push(`</div><!--]-->`);
		};
	}
};
var _sfc_setup$9 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/TheMenu.vue");
	return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Molecules/LangSwitch.vue
var _sfc_main$8 = {
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
var _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Molecules/LangSwitch.vue");
	return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Header.vue
var _sfc_main$7 = {
	__name: "Header",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		computed(() => page.props.cms.header);
		const ctaLabel = computed(() => page.props.translations.header_cta_label);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<header${ssrRenderAttrs(mergeProps({ class: "relative z-99 border-b border-secondary-200 py-4 md:py-6" }, _attrs))}><div class="mx-auto flex w-full max-w-8xl items-center justify-between px-6 md:px-32"><div class="shrink-0">`);
			_push(ssrRenderComponent(Logo_default, { class: "h-10 w-12" }, null, _parent));
			_push(`</div>`);
			_push(ssrRenderComponent(_sfc_main$9, null, null, _parent));
			_push(`<div class="hidden items-center gap-4 md:flex">`);
			_push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
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
			_push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
			_push(`</div></div></header>`);
		};
	}
};
var _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Header.vue");
	return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Icons/GithubLogo.vue
var _sfc_main$6 = {};
function _sfc_ssrRender$3(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		fill: "currentColor",
		viewBox: "0 0 256 256",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M208.31,75.68A59.78,59.78,0,0,0,202.93,28,8,8,0,0,0,196,24a59.75,59.75,0,0,0-48,24H124A59.75,59.75,0,0,0,76,24a8,8,0,0,0-6.93,4,59.78,59.78,0,0,0-5.38,47.68A58.14,58.14,0,0,0,56,104v8a56.06,56.06,0,0,0,48.44,55.47A39.8,39.8,0,0,0,96,192v8H72a24,24,0,0,1-24-24A40,40,0,0,0,8,136a8,8,0,0,0,0,16,24,24,0,0,1,24,24,40,40,0,0,0,40,40H96v16a8,8,0,0,0,16,0V192a24,24,0,0,1,48,0v40a8,8,0,0,0,16,0V192a39.8,39.8,0,0,0-8.44-24.53A56.06,56.06,0,0,0,216,112v-8A58.14,58.14,0,0,0,208.31,75.68ZM200,112a40,40,0,0,1-40,40H112a40,40,0,0,1-40-40v-8a41.74,41.74,0,0,1,6.9-22.48A8,8,0,0,0,80,73.83a43.81,43.81,0,0,1,.79-33.58,43.88,43.88,0,0,1,32.32,20.06A8,8,0,0,0,119.82,64h32.35a8,8,0,0,0,6.74-3.69,43.87,43.87,0,0,1,32.32-20.06A43.81,43.81,0,0,1,192,73.83a8.09,8.09,0,0,0,1,7.65A41.72,41.72,0,0,1,200,104Z"></path></svg>`);
}
var _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/GithubLogo.vue");
	return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
var GithubLogo_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$6, [["ssrRender", _sfc_ssrRender$3]]);
//#endregion
//#region resources/js/Components/Icons/InstagramLogo.vue
var _sfc_main$5 = {};
function _sfc_ssrRender$2(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		fill: "currentColor",
		viewBox: "0 0 256 256",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z"></path></svg>`);
}
var _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/InstagramLogo.vue");
	return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
var InstagramLogo_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$5, [["ssrRender", _sfc_ssrRender$2]]);
//#endregion
//#region resources/js/Components/Icons/LinkedinLogo.vue
var _sfc_main$4 = {};
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		fill: "currentColor",
		viewBox: "0 0 256 256",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M216,24H40A16,16,0,0,0,24,40V216a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V40A16,16,0,0,0,216,24Zm0,192H40V40H216V216ZM96,112v64a8,8,0,0,1-16,0V112a8,8,0,0,1,16,0Zm88,28v36a8,8,0,0,1-16,0V140a20,20,0,0,0-40,0v36a8,8,0,0,1-16,0V112a8,8,0,0,1,15.79-1.78A36,36,0,0,1,184,140ZM100,84A12,12,0,1,1,88,72,12,12,0,0,1,100,84Z"></path></svg>`);
}
var _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/LinkedinLogo.vue");
	return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
var LinkedinLogo_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$4, [["ssrRender", _sfc_ssrRender$1]]);
//#endregion
//#region resources/js/Components/Atoms/BaseButton.vue
var _sfc_main$3 = {
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
var _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/BaseButton.vue");
	return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Icons/FooterContactArrow.vue
var _sfc_main$2 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		class: "relative z-10 h-4 w-4 transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 rtl:rotate-90 rtl:group-hover:-translate-x-0.5",
		fill: "none",
		stroke: "currentColor",
		viewBox: "0 0 24 24",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M7 17L17 7M17 7H8M17 7V16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>`);
}
var _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/FooterContactArrow.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
var FooterContactArrow_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$2, [["ssrRender", _sfc_ssrRender]]);
//#endregion
//#region resources/js/Components/Organisms/Footer.vue
var _sfc_main$1 = {
	__name: "Footer",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const footer = computed(() => page.props.cms.footer);
		const socials = computed(() => page.props.cms.socials);
		const navigation = computed(() => page.props.cms.footerNavigation);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<footer${ssrRenderAttrs(mergeProps({ class: "bg-slate-900 py-10 sm:pt-16 lg:pt-24" }, _attrs))}><div class="mx-auto max-w-7xl px-4 sm:px-12 lg:px-8"><div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-32"><div class="space-y-16">`);
			_push(ssrRenderComponent(Subtitle_default, { class: "text-start text-white" }, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(`${ssrInterpolate(footer.value.title)}`);
					else return [createTextVNode(toDisplayString(footer.value.title), 1)];
				}),
				_: 1
			}, _parent));
			_push(`<div class="flex justify-start">`);
			_push(ssrRenderComponent(unref(Link), {
				class: "group relative inline-flex items-center gap-2 rounded-full border border-white/10 bg-white px-4 py-2 text-secondary-950 backdrop-blur-md transition-all duration-300",
				href: "/contact"
			}, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(`<span class="pointer-events-none absolute left-1/2 top-1/2 h-12 w-28 -translate-x-1/2 -translate-y-1/2 scale-75 rounded-full bg-[radial-gradient(circle,rgba(2,129,199,0.45)_0%,transparent_70%)] opacity-0 blur-xl transition-all duration-300 group-hover:scale-100 group-hover:opacity-100"${_scopeId}></span><span class="relative z-10 font-medium"${_scopeId}>${ssrInterpolate(footer.value.button_label)}</span>`);
						_push(ssrRenderComponent(FooterContactArrow_default, null, null, _parent, _scopeId));
					} else return [
						createVNode("span", { class: "pointer-events-none absolute left-1/2 top-1/2 h-12 w-28 -translate-x-1/2 -translate-y-1/2 scale-75 rounded-full bg-[radial-gradient(circle,rgba(2,129,199,0.45)_0%,transparent_70%)] opacity-0 blur-xl transition-all duration-300 group-hover:scale-100 group-hover:opacity-100" }),
						createVNode("span", { class: "relative z-10 font-medium" }, toDisplayString(footer.value.button_label), 1),
						createVNode(FooterContactArrow_default)
					];
				}),
				_: 1
			}, _parent));
			_push(`</div></div><div class="flex flex-col space-y-10"><p class="mt-4 inline-flex pe-32 text-start text-secondary-100">${ssrInterpolate(footer.value.description)}</p><div class="flex flex-wrap gap-4"><!--[-->`);
			ssrRenderList(socials.value, (social) => {
				_push(ssrRenderComponent(_sfc_main$3, {
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
			_push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
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
	return usePage().props.translations.pages[page];
}
//#endregion
export { _sfc_main as n, _sfc_main$3 as r, useGetTitle as t };

//# sourceMappingURL=useGetTitle--vwnvYF8.js.map