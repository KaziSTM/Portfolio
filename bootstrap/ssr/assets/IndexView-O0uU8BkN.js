import { t as Subtitle_default } from "./Subtitle-DtkDPELn.js";
import { n as _sfc_main$3, r as BorderGlow_default, t as FadeContent_default } from "./FadeContent-_tRcBepR.js";
import { n as _sfc_main$4, t as useGetTitle } from "./useGetTitle-DejgjcG2.js";
import { Fragment, computed, createBlock, createCommentVNode, createTextVNode, createVNode, defineComponent, mergeProps, openBlock, ref, renderList, renderSlot, toDisplayString, unref, useSSRContext, withCtx } from "vue";
import { Head, Link, router, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderComponent, ssrRenderList, ssrRenderSlot } from "vue/server-renderer";
//#region resources/js/Components/Atoms/Pagination.vue
var _sfc_main$2 = {
	__name: "Pagination",
	__ssrInlineRender: true,
	props: {
		links: {
			type: Array,
			required: true
		},
		translations: {
			type: Object,
			required: true
		}
	},
	setup(__props) {
		const props = __props;
		usePage();
		const previous = computed(() => props.links[0]);
		const next = computed(() => props.links[props.links.length - 1]);
		const pages = computed(() => props.links.slice(1, -1));
		return (_ctx, _push, _parent, _attrs) => {
			if (__props.links.length > 3) {
				_push(`<nav${ssrRenderAttrs(mergeProps({
					"aria-label": "Pagination Navigation",
					class: "flex items-center justify-center space-x-2"
				}, _attrs))}>`);
				if (!previous.value.url) _push(`<span class="cursor-not-allowed rounded-full border border-slate-300 bg-slate-100 px-6 py-3 text-sm font-medium text-gray-700">${ssrInterpolate(__props.translations.prev)}</span>`);
				else _push(ssrRenderComponent(unref(Link), {
					href: previous.value.url,
					class: "rounded-full border border-slate-100 bg-slate-50 px-6 py-3 text-sm font-medium text-slate-500 transition-colors hover:bg-slate-100",
					"preserve-scroll": ""
				}, {
					default: withCtx((_, _push, _parent, _scopeId) => {
						if (_push) _push(`${ssrInterpolate(__props.translations.prev)}`);
						else return [createTextVNode(toDisplayString(__props.translations.prev), 1)];
					}),
					_: 1
				}, _parent));
				_push(`<!--[-->`);
				ssrRenderList(pages.value, (link) => {
					_push(`<!--[-->`);
					if (!link.url) _push(`<span class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-50/50 text-sm text-slate-400">${link.label ?? ""}</span>`);
					else if (link.active) _push(`<span class="flex h-12 w-12 items-center justify-center rounded-full bg-primary-500 text-sm font-bold text-white shadow-lg shadow-primary-200">${ssrInterpolate(link.label)}</span>`);
					else _push(ssrRenderComponent(unref(Link), {
						href: link.url,
						class: "flex h-12 w-12 items-center justify-center rounded-full border border-slate-100 bg-slate-50 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100",
						"preserve-scroll": ""
					}, {
						default: withCtx((_, _push, _parent, _scopeId) => {
							if (_push) _push(`${ssrInterpolate(link.label)}`);
							else return [createTextVNode(toDisplayString(link.label), 1)];
						}),
						_: 2
					}, _parent));
					_push(`<!--]-->`);
				});
				_push(`<!--]-->`);
				if (!next.value.url) _push(`<span class="cursor-not-allowed rounded-full border border-slate-300 bg-slate-100 px-6 py-3 text-sm font-medium text-gray-700">${ssrInterpolate(__props.translations.next)}</span>`);
				else _push(ssrRenderComponent(unref(Link), {
					href: next.value.url,
					class: "rounded-full border border-slate-100 bg-slate-50 px-6 py-3 text-sm font-medium text-slate-700 transition-colors hover:bg-slate-100",
					"preserve-scroll": ""
				}, {
					default: withCtx((_, _push, _parent, _scopeId) => {
						if (_push) _push(`${ssrInterpolate(__props.translations.next)}`);
						else return [createTextVNode(toDisplayString(__props.translations.next), 1)];
					}),
					_: 1
				}, _parent));
				_push(`</nav>`);
			} else _push(`<!---->`);
		};
	}
};
var _sfc_setup$3 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Pagination.vue");
	return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Atoms/ListCardGlow.vue?vue&type=script&setup=true&lang.ts
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
var ListCardGlow_vue_vue_type_script_setup_true_lang_default = /*@__PURE__*/ defineComponent({
	__name: "ListCardGlow",
	__ssrInlineRender: true,
	props: {
		reverse: { type: Boolean },
		className: {}
	},
	setup(__props) {
		const props = __props;
		const borderRadius = computed(() => props.reverse ? "1rem 1rem 3rem 1rem" : "3rem 1rem 1rem 1rem");
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({
				style: {
					borderRadius: borderRadius.value,
					overflow: "hidden"
				},
				class: __props.className
			}, _attrs))}>`);
			_push(ssrRenderComponent(BorderGlow_default, {
				"edge-sensitivity": 30,
				"glow-color": "171 92 35",
				"background-color": "#f1f5f9",
				"border-radius": borderRadius.value,
				"glow-radius": 28,
				"glow-intensity": .75,
				"cone-spread": 20,
				animated: false,
				colors: [
					"#21e0c0",
					"#08b89d",
					"#049d89"
				],
				"card-shadow": "0 2px 8px var(--color-secondary-200, #e2e8f0), 0 1px 3px var(--color-secondary-300, #cbd5e1)"
			}, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent, _scopeId);
					else return [renderSlot(_ctx.$slots, "default")];
				}),
				_: 3
			}, _parent));
			_push(`</div>`);
		};
	}
});
//#endregion
//#region resources/js/Components/Atoms/ListCardGlow.vue
var _sfc_setup$2 = ListCardGlow_vue_vue_type_script_setup_true_lang_default.setup;
ListCardGlow_vue_vue_type_script_setup_true_lang_default.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/ListCardGlow.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
var ListCardGlow_default = ListCardGlow_vue_vue_type_script_setup_true_lang_default;
//#endregion
//#region resources/js/Components/Molecules/ListProjectCard.vue
var _sfc_main$1 = {
	__name: "ListProjectCard",
	__ssrInlineRender: true,
	props: {
		project: Object,
		reverse: {
			type: Boolean,
			default: false
		},
		translations: {
			type: Object,
			required: true
		}
	},
	setup(__props) {
		const zoom = ref(false);
		return (_ctx, _push, _parent, _attrs) => {
			_push(ssrRenderComponent(FadeContent_default, mergeProps({
				blur: true,
				delay: 100,
				duration: 700,
				"initial-opacity": 10,
				threshold: .1,
				"class-name": "my-fade-content",
				easing: "ease-out"
			}, _attrs), {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(ssrRenderComponent(ListCardGlow_default, {
						reverse: __props.reverse,
						"class-name": __props.reverse ? "md:mt-24 lg:mt-32" : ""
					}, {
						default: withCtx((_, _push, _parent, _scopeId) => {
							if (_push) {
								_push(`<div class="px-6 py-8 sm:px-7 sm:py-10 lg:px-8 lg:py-11 h-full flex flex-col justify-between items-center text-center"${_scopeId}><div class="space-y-4 flex flex-col items-center w-full"${_scopeId}>`);
								if (!__props.reverse) _push(ssrRenderComponent(unref(Link), {
									href: __props.project.project_url,
									class: "mb-5 sm:mb-6 lg:mb-7 overflow-hidden rounded-2xl w-full cursor-pointer block",
									onMouseenter: ($event) => zoom.value = true,
									onMouseleave: ($event) => zoom.value = false
								}, {
									default: withCtx((_, _push, _parent, _scopeId) => {
										if (_push) _push(`<img${ssrRenderAttr("alt", __props.project.header)} class="${ssrRenderClass([{ "scale-110": zoom.value }, "w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"])}"${ssrRenderAttr("src", __props.project.logo_url)}${_scopeId}>`);
										else return [createVNode("img", {
											alt: __props.project.header,
											class: [{ "scale-110": zoom.value }, "w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"],
											src: __props.project.logo_url
										}, null, 10, ["alt", "src"])];
									}),
									_: 1
								}, _parent, _scopeId));
								else _push(`<!---->`);
								_push(`<div class="space-y-3.5 sm:space-y-4 flex flex-col items-center w-full"${_scopeId}><div class="flex items-center justify-center flex-wrap gap-2 text-xs tracking-widest uppercase"${_scopeId}><span class="inline-block rounded-md border border-gray-400 px-2.5 py-1 text-[10px] font-medium text-gray-700"${_scopeId}>${ssrInterpolate(__props.project.type_label)}</span>`);
								if (__props.project.is_in_progress) _push(`<span class="inline-block rounded-md bg-amber-100 px-2.5 py-1 text-[10px] font-medium text-amber-700 normal-case tracking-normal"${_scopeId}>${ssrInterpolate(__props.translations.projects?.ongoing ?? __props.translations.projects?.in_progress ?? "Ongoing")}</span>`);
								else _push(`<!---->`);
								_push(`<div class="flex flex-wrap items-center justify-center gap-2 text-xs tracking-widest uppercase text-gray-600"${_scopeId}><!--[-->`);
								ssrRenderList(__props.project.role_labels, (role, index) => {
									_push(`<!--[--><span${_scopeId}>${ssrInterpolate(role)}</span>`);
									if (index !== __props.project.role_labels.length - 1) _push(`<span class="opacity-30"${_scopeId}>•</span>`);
									else _push(`<!---->`);
									_push(`<!--]-->`);
								});
								_push(`<!--]--></div></div><h3 class="block mt-2.5 sm:mt-3.5 text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 leading-snug font-display text-center break-words [overflow-wrap:anywhere] min-w-0"${_scopeId}>${ssrInterpolate(__props.project.header)}</h3>`);
								if (__props.project.description) _push(`<p class="line-clamp-3 text-center leading-relaxed text-gray-600 text-sm sm:text-base"${_scopeId}>${__props.project.description ?? ""}</p>`);
								else _push(`<!---->`);
								_push(`</div></div><div class="mt-5 pt-2 flex justify-center w-full"${_scopeId}>`);
								_push(ssrRenderComponent(_sfc_main$3, {
									"is-package": __props.project.is_package,
									"project-id": __props.project.id,
									"project-title": __props.project.header,
									translations: __props.translations,
									url: __props.project.project_url
								}, null, _parent, _scopeId));
								_push(`</div>`);
								if (__props.reverse) _push(ssrRenderComponent(unref(Link), {
									href: __props.project.project_url,
									class: "mt-5 sm:mt-6 lg:mt-7 overflow-hidden rounded-2xl w-full cursor-pointer block",
									onMouseenter: ($event) => zoom.value = true,
									onMouseleave: ($event) => zoom.value = false
								}, {
									default: withCtx((_, _push, _parent, _scopeId) => {
										if (_push) _push(`<img${ssrRenderAttr("alt", __props.project.header)} class="${ssrRenderClass([{ "scale-110": zoom.value }, "w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"])}"${ssrRenderAttr("src", __props.project.logo_url)}${_scopeId}>`);
										else return [createVNode("img", {
											alt: __props.project.header,
											class: [{ "scale-110": zoom.value }, "w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"],
											src: __props.project.logo_url
										}, null, 10, ["alt", "src"])];
									}),
									_: 1
								}, _parent, _scopeId));
								else _push(`<!---->`);
								_push(`</div>`);
							} else return [createVNode("div", { class: "px-6 py-8 sm:px-7 sm:py-10 lg:px-8 lg:py-11 h-full flex flex-col justify-between items-center text-center" }, [
								createVNode("div", { class: "space-y-4 flex flex-col items-center w-full" }, [!__props.reverse ? (openBlock(), createBlock(unref(Link), {
									key: 0,
									href: __props.project.project_url,
									class: "mb-5 sm:mb-6 lg:mb-7 overflow-hidden rounded-2xl w-full cursor-pointer block",
									onMouseenter: ($event) => zoom.value = true,
									onMouseleave: ($event) => zoom.value = false
								}, {
									default: withCtx(() => [createVNode("img", {
										alt: __props.project.header,
										class: [{ "scale-110": zoom.value }, "w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"],
										src: __props.project.logo_url
									}, null, 10, ["alt", "src"])]),
									_: 1
								}, 8, [
									"href",
									"onMouseenter",
									"onMouseleave"
								])) : createCommentVNode("", true), createVNode("div", { class: "space-y-3.5 sm:space-y-4 flex flex-col items-center w-full" }, [
									createVNode("div", { class: "flex items-center justify-center flex-wrap gap-2 text-xs tracking-widest uppercase" }, [
										createVNode("span", {
											class: "inline-block rounded-md border border-gray-400 px-2.5 py-1 text-[10px] font-medium text-gray-700",
											textContent: toDisplayString(__props.project.type_label)
										}, null, 8, ["textContent"]),
										__props.project.is_in_progress ? (openBlock(), createBlock("span", {
											key: 0,
											class: "inline-block rounded-md bg-amber-100 px-2.5 py-1 text-[10px] font-medium text-amber-700 normal-case tracking-normal"
										}, toDisplayString(__props.translations.projects?.ongoing ?? __props.translations.projects?.in_progress ?? "Ongoing"), 1)) : createCommentVNode("", true),
										createVNode("div", { class: "flex flex-wrap items-center justify-center gap-2 text-xs tracking-widest uppercase text-gray-600" }, [(openBlock(true), createBlock(Fragment, null, renderList(__props.project.role_labels, (role, index) => {
											return openBlock(), createBlock(Fragment, { key: role }, [createVNode("span", null, toDisplayString(role), 1), index !== __props.project.role_labels.length - 1 ? (openBlock(), createBlock("span", {
												key: 0,
												class: "opacity-30"
											}, "•")) : createCommentVNode("", true)], 64);
										}), 128))])
									]),
									createVNode("h3", {
										class: "block mt-2.5 sm:mt-3.5 text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 leading-snug font-display text-center break-words [overflow-wrap:anywhere] min-w-0",
										textContent: toDisplayString(__props.project.header)
									}, null, 8, ["textContent"]),
									__props.project.description ? (openBlock(), createBlock("p", {
										key: 0,
										class: "line-clamp-3 text-center leading-relaxed text-gray-600 text-sm sm:text-base",
										innerHTML: __props.project.description
									}, null, 8, ["innerHTML"])) : createCommentVNode("", true)
								])]),
								createVNode("div", { class: "mt-5 pt-2 flex justify-center w-full" }, [createVNode(_sfc_main$3, {
									"is-package": __props.project.is_package,
									"project-id": __props.project.id,
									"project-title": __props.project.header,
									translations: __props.translations,
									url: __props.project.project_url
								}, null, 8, [
									"is-package",
									"project-id",
									"project-title",
									"translations",
									"url"
								])]),
								__props.reverse ? (openBlock(), createBlock(unref(Link), {
									key: 0,
									href: __props.project.project_url,
									class: "mt-5 sm:mt-6 lg:mt-7 overflow-hidden rounded-2xl w-full cursor-pointer block",
									onMouseenter: ($event) => zoom.value = true,
									onMouseleave: ($event) => zoom.value = false
								}, {
									default: withCtx(() => [createVNode("img", {
										alt: __props.project.header,
										class: [{ "scale-110": zoom.value }, "w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"],
										src: __props.project.logo_url
									}, null, 10, ["alt", "src"])]),
									_: 1
								}, 8, [
									"href",
									"onMouseenter",
									"onMouseleave"
								])) : createCommentVNode("", true)
							])];
						}),
						_: 1
					}, _parent, _scopeId));
					else return [createVNode(ListCardGlow_default, {
						reverse: __props.reverse,
						"class-name": __props.reverse ? "md:mt-24 lg:mt-32" : ""
					}, {
						default: withCtx(() => [createVNode("div", { class: "px-6 py-8 sm:px-7 sm:py-10 lg:px-8 lg:py-11 h-full flex flex-col justify-between items-center text-center" }, [
							createVNode("div", { class: "space-y-4 flex flex-col items-center w-full" }, [!__props.reverse ? (openBlock(), createBlock(unref(Link), {
								key: 0,
								href: __props.project.project_url,
								class: "mb-5 sm:mb-6 lg:mb-7 overflow-hidden rounded-2xl w-full cursor-pointer block",
								onMouseenter: ($event) => zoom.value = true,
								onMouseleave: ($event) => zoom.value = false
							}, {
								default: withCtx(() => [createVNode("img", {
									alt: __props.project.header,
									class: [{ "scale-110": zoom.value }, "w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"],
									src: __props.project.logo_url
								}, null, 10, ["alt", "src"])]),
								_: 1
							}, 8, [
								"href",
								"onMouseenter",
								"onMouseleave"
							])) : createCommentVNode("", true), createVNode("div", { class: "space-y-3.5 sm:space-y-4 flex flex-col items-center w-full" }, [
								createVNode("div", { class: "flex items-center justify-center flex-wrap gap-2 text-xs tracking-widest uppercase" }, [
									createVNode("span", {
										class: "inline-block rounded-md border border-gray-400 px-2.5 py-1 text-[10px] font-medium text-gray-700",
										textContent: toDisplayString(__props.project.type_label)
									}, null, 8, ["textContent"]),
									__props.project.is_in_progress ? (openBlock(), createBlock("span", {
										key: 0,
										class: "inline-block rounded-md bg-amber-100 px-2.5 py-1 text-[10px] font-medium text-amber-700 normal-case tracking-normal"
									}, toDisplayString(__props.translations.projects?.ongoing ?? __props.translations.projects?.in_progress ?? "Ongoing"), 1)) : createCommentVNode("", true),
									createVNode("div", { class: "flex flex-wrap items-center justify-center gap-2 text-xs tracking-widest uppercase text-gray-600" }, [(openBlock(true), createBlock(Fragment, null, renderList(__props.project.role_labels, (role, index) => {
										return openBlock(), createBlock(Fragment, { key: role }, [createVNode("span", null, toDisplayString(role), 1), index !== __props.project.role_labels.length - 1 ? (openBlock(), createBlock("span", {
											key: 0,
											class: "opacity-30"
										}, "•")) : createCommentVNode("", true)], 64);
									}), 128))])
								]),
								createVNode("h3", {
									class: "block mt-2.5 sm:mt-3.5 text-lg sm:text-xl lg:text-2xl font-semibold text-gray-900 leading-snug font-display text-center break-words [overflow-wrap:anywhere] min-w-0",
									textContent: toDisplayString(__props.project.header)
								}, null, 8, ["textContent"]),
								__props.project.description ? (openBlock(), createBlock("p", {
									key: 0,
									class: "line-clamp-3 text-center leading-relaxed text-gray-600 text-sm sm:text-base",
									innerHTML: __props.project.description
								}, null, 8, ["innerHTML"])) : createCommentVNode("", true)
							])]),
							createVNode("div", { class: "mt-5 pt-2 flex justify-center w-full" }, [createVNode(_sfc_main$3, {
								"is-package": __props.project.is_package,
								"project-id": __props.project.id,
								"project-title": __props.project.header,
								translations: __props.translations,
								url: __props.project.project_url
							}, null, 8, [
								"is-package",
								"project-id",
								"project-title",
								"translations",
								"url"
							])]),
							__props.reverse ? (openBlock(), createBlock(unref(Link), {
								key: 0,
								href: __props.project.project_url,
								class: "mt-5 sm:mt-6 lg:mt-7 overflow-hidden rounded-2xl w-full cursor-pointer block",
								onMouseenter: ($event) => zoom.value = true,
								onMouseleave: ($event) => zoom.value = false
							}, {
								default: withCtx(() => [createVNode("img", {
									alt: __props.project.header,
									class: [{ "scale-110": zoom.value }, "w-full h-64 sm:h-72 lg:h-80 xl:h-84 object-cover rounded-2xl transition-transform duration-500 ease-in-out"],
									src: __props.project.logo_url
								}, null, 10, ["alt", "src"])]),
								_: 1
							}, 8, [
								"href",
								"onMouseenter",
								"onMouseleave"
							])) : createCommentVNode("", true)
						])]),
						_: 1
					}, 8, ["reverse", "class-name"])];
				}),
				_: 1
			}, _parent));
		};
	}
};
var _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Molecules/ListProjectCard.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Pages/Projects/IndexView.vue
var _sfc_main = {
	__name: "IndexView",
	__ssrInlineRender: true,
	props: {
		pageHeader: {
			type: Object,
			default: null
		},
		header: {
			type: Object,
			default: null
		},
		projects: {
			type: Object,
			required: true
		},
		filters: {
			type: Array,
			default: () => []
		},
		selectedFilter: {
			type: String,
			default: ""
		},
		roles: {
			type: Array,
			default: () => []
		},
		selectedRole: {
			type: String,
			default: ""
		},
		translations: {
			type: Object,
			required: true
		}
	},
	setup(__props) {
		const title = useGetTitle("work");
		function setFilter(filter = null) {
			router.get(route("work"), { filter }, {
				preserveState: true,
				preserveScroll: true,
				replace: true
			});
		}
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<!--[-->`);
			_push(ssrRenderComponent(unref(Head), { title: unref(title) }, null, _parent));
			_push(ssrRenderComponent(_sfc_main$4, null, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(`<section class="relative mx-auto max-w-6xl space-y-8 px-4 pb-24 pt-8 sm:px-6 sm:pb-28 sm:pt-10 md:space-y-16 lg:pb-32"${_scopeId}>`);
						if (__props.pageHeader || __props.header && __props.header.title) {
							_push(`<div class="flex flex-col md:flex-row md:items-center justify-between gap-6 md:gap-12 w-full pt-8 sm:pt-10"${_scopeId}>`);
							_push(ssrRenderComponent(Subtitle_default, { class: "text-start mt-2 sm:mt-3" }, {
								default: withCtx((_, _push, _parent, _scopeId) => {
									if (_push) _push(`${ssrInterpolate((__props.pageHeader || __props.header).title)}`);
									else return [createTextVNode(toDisplayString((__props.pageHeader || __props.header).title), 1)];
								}),
								_: 1
							}, _parent, _scopeId));
							_push(`<p class="text-lg lg:text-xl text-start text-gray-700 max-w-xl lg:max-w-2xl"${_scopeId}>${(__props.pageHeader || __props.header).description ?? ""}</p></div>`);
						} else _push(`<!---->`);
						_push(`<div class="mt-10 flex flex-wrap justify-start gap-3"${_scopeId}><button class="${ssrRenderClass([{
							"bg-primary-700 text-white shadow-lg": !(__props.selectedFilter || __props.selectedRole),
							"bg-secondary-100 text-secondary-600 hover:bg-secondary-200": __props.selectedFilter || __props.selectedRole
						}, "rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"])}"${_scopeId}>${ssrInterpolate(__props.translations.filters?.all ?? __props.translations.projects.all)}</button><!--[-->`);
						ssrRenderList(__props.filters.length ? __props.filters : __props.roles, (item) => {
							_push(`<button class="${ssrRenderClass([{
								"bg-primary-700 text-white shadow-lg": (__props.selectedFilter || __props.selectedRole) === item.value,
								"bg-secondary-100 text-secondary-600 hover:bg-secondary-200": (__props.selectedFilter || __props.selectedRole) !== item.value
							}, "rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"])}"${_scopeId}>${ssrInterpolate(item.label)}</button>`);
						});
						_push(`<!--]--></div><div class="grid grid-cols-1 items-start gap-x-6 gap-y-10 md:grid-cols-2 md:gap-x-10 md:gap-y-16 lg:gap-x-14 lg:gap-y-20"${_scopeId}><!--[-->`);
						ssrRenderList(__props.projects.data, (project, index) => {
							_push(`<div class="relative h-full overflow-hidden"${_scopeId}>`);
							_push(ssrRenderComponent(_sfc_main$1, {
								project,
								reverse: index % 2 !== 0,
								translations: __props.translations
							}, null, _parent, _scopeId));
							_push(`</div>`);
						});
						_push(`<!--]--></div>`);
						_push(ssrRenderComponent(_sfc_main$2, {
							links: __props.projects.meta.links,
							translations: __props.translations.actions
						}, null, _parent, _scopeId));
						_push(`</section>`);
					} else return [createVNode("section", { class: "relative mx-auto max-w-6xl space-y-8 px-4 pb-24 pt-8 sm:px-6 sm:pb-28 sm:pt-10 md:space-y-16 lg:pb-32" }, [
						__props.pageHeader || __props.header && __props.header.title ? (openBlock(), createBlock("div", {
							key: 0,
							class: "flex flex-col md:flex-row md:items-center justify-between gap-6 md:gap-12 w-full pt-8 sm:pt-10"
						}, [createVNode(Subtitle_default, { class: "text-start mt-2 sm:mt-3" }, {
							default: withCtx(() => [createTextVNode(toDisplayString((__props.pageHeader || __props.header).title), 1)]),
							_: 1
						}), createVNode("p", {
							class: "text-lg lg:text-xl text-start text-gray-700 max-w-xl lg:max-w-2xl",
							innerHTML: (__props.pageHeader || __props.header).description
						}, null, 8, ["innerHTML"])])) : createCommentVNode("", true),
						createVNode("div", { class: "mt-10 flex flex-wrap justify-start gap-3" }, [createVNode("button", {
							class: [{
								"bg-primary-700 text-white shadow-lg": !(__props.selectedFilter || __props.selectedRole),
								"bg-secondary-100 text-secondary-600 hover:bg-secondary-200": __props.selectedFilter || __props.selectedRole
							}, "rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"],
							onClick: ($event) => setFilter()
						}, toDisplayString(__props.translations.filters?.all ?? __props.translations.projects.all), 11, ["onClick"]), (openBlock(true), createBlock(Fragment, null, renderList(__props.filters.length ? __props.filters : __props.roles, (item) => {
							return openBlock(), createBlock("button", {
								key: item.value,
								class: [{
									"bg-primary-700 text-white shadow-lg": (__props.selectedFilter || __props.selectedRole) === item.value,
									"bg-secondary-100 text-secondary-600 hover:bg-secondary-200": (__props.selectedFilter || __props.selectedRole) !== item.value
								}, "rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"],
								onClick: ($event) => setFilter(item.value)
							}, toDisplayString(item.label), 11, ["onClick"]);
						}), 128))]),
						createVNode("div", { class: "grid grid-cols-1 items-start gap-x-6 gap-y-10 md:grid-cols-2 md:gap-x-10 md:gap-y-16 lg:gap-x-14 lg:gap-y-20" }, [(openBlock(true), createBlock(Fragment, null, renderList(__props.projects.data, (project, index) => {
							return openBlock(), createBlock("div", {
								key: project.id,
								class: "relative h-full overflow-hidden"
							}, [createVNode(_sfc_main$1, {
								project,
								reverse: index % 2 !== 0,
								translations: __props.translations
							}, null, 8, [
								"project",
								"reverse",
								"translations"
							])]);
						}), 128))]),
						createVNode(_sfc_main$2, {
							links: __props.projects.meta.links,
							translations: __props.translations.actions
						}, null, 8, ["links", "translations"])
					])];
				}),
				_: 1
			}, _parent));
			_push(`<!--]-->`);
		};
	}
};
var _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Projects/IndexView.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
export { _sfc_main as default };

//# sourceMappingURL=IndexView-O0uU8BkN.js.map