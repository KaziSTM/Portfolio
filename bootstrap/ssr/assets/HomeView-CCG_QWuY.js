import { a as _plugin_vue_export_helper_default, i as _sfc_main$15, n as _sfc_main$16, r as Subtitle_default, t as useGetTitle } from "./useGetTitle-BRp-LxPk.js";
import { t as DownloadSimple_default } from "./DownloadSimple-D2kSO18w.js";
import { n as _sfc_main$17, t as FadeContent_default } from "./FadeContent-BIRVTgEr.js";
import { Fragment, computed, createBlock, createCommentVNode, createTextVNode, createVNode, mergeProps, openBlock, ref, renderList, resolveDynamicComponent, toDisplayString, unref, useSSRContext, withCtx } from "vue";
import { Head, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderComponent, ssrRenderList, ssrRenderSlot, ssrRenderStyle, ssrRenderVNode } from "vue/server-renderer";
//#region resources/js/Components/Atoms/Section.vue
var _sfc_main$14 = {};
function _sfc_ssrRender$7(_ctx, _push, _parent, _attrs) {
	_push(`<section${ssrRenderAttrs(mergeProps({ class: "relative py-20 px-4 md:py-28 lg:py-32 lg:px-8" }, _attrs))}>`);
	ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
	_push(`</section>`);
}
var _sfc_setup$14 = _sfc_main$14.setup;
_sfc_main$14.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Section.vue");
	return _sfc_setup$14 ? _sfc_setup$14(props, ctx) : void 0;
};
var Section_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$14, [["ssrRender", _sfc_ssrRender$7]]);
//#endregion
//#region resources/js/Components/Atoms/Title.vue
var _sfc_main$13 = {};
function _sfc_ssrRender$6(_ctx, _push, _parent, _attrs) {
	_push(`<h1${ssrRenderAttrs(mergeProps({ class: "text-2xl font-bold text-black md:text-4xl lg:text-5xl xl:text-6xl" }, _attrs))}>`);
	ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
	_push(`</h1>`);
}
var _sfc_setup$13 = _sfc_main$13.setup;
_sfc_main$13.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Title.vue");
	return _sfc_setup$13 ? _sfc_setup$13(props, ctx) : void 0;
};
var Title_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$13, [["ssrRender", _sfc_ssrRender$6]]);
//#endregion
//#region resources/js/Components/Icons/Underline.vue
var _sfc_main$12 = {};
function _sfc_ssrRender$5(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		fill: "currentColor",
		viewBox: "0 0 249 22",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M247.564 18.5807C241.772 13.3568 232.473 12.7526 225.225 11.4427C217.124 9.97395 208.996 8.57031 200.846 7.46093C186.542 5.51302 172.169 4.08854 157.79 3.01562C126.033 0.645827 94.0929 0.0338481 62.3387 2.36979C42.1785 3.85416 22.008 5.90885 2.32917 10.8463C-0.0155171 11.4349 0.207047 14.6719 2.6889 14.7083C22.0261 14.9896 41.3866 12.6406 60.7109 11.8568C79.9471 11.0807 99.2274 10.6719 118.484 10.9557C142.604 11.3125 166.719 12.8333 190.722 15.5156C199.956 16.5469 209.195 17.6016 218.411 18.8255C227.864 20.0807 237.259 22 246.767 20.7422C247.709 20.6198 248.426 19.3568 247.564 18.5807Z"></path></svg>`);
}
var _sfc_setup$12 = _sfc_main$12.setup;
_sfc_main$12.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/Underline.vue");
	return _sfc_setup$12 ? _sfc_setup$12(props, ctx) : void 0;
};
var Underline_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$12, [["ssrRender", _sfc_ssrRender$5]]);
//#endregion
//#region resources/js/Components/Icons/HeroArrow.vue
var _sfc_main$11 = {};
function _sfc_ssrRender$4(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		id: "master-artboard",
		style: { "enable-background": "new 0 0 1400 980" },
		version: "1.1",
		viewBox: "0 0 1400 980",
		x: "0px",
		xmlns: "http://www.w3.org/2000/svg",
		y: "0px"
	}, _attrs))}><path d="M 260.79998779296875 86.19999694824219" style="${ssrRenderStyle({
		"fill": "rgb(23, 168, 247)",
		"fill-opacity": "1",
		"stroke": "rgb(0, 0, 0)",
		"stroke-opacity": "1",
		"stroke-width": "0",
		"paint-order": "fill"
	})}"></path><g transform="matrix(0.0018328310688957574, -9.6078519821167, -9.6078519821167, -0.0018328310688957574, 1168.819348724845, 988.0170288085938)"><g><path d="M19.3253 77.6737C14.1134 76.5032 11.6329 74.3731 9.5344 69.5548C9.21134 68.8129 8.19484 63.1864 7.53037 63.112C6.25335 62.9691 3.21916 70.4678 2.9682 71.2948C1.40658 76.4418 6.28171 76.9284 10.5148 77.213C11.502 77.2793 17.7243 77.9867 16.755 78.0657C13.5771 78.3248 9.99484 77.7788 6.85897 77.2296C3.24474 76.5966 0.348605 75.1774 5.76428 74.151C20.2216 71.4112 32.2897 67.5184 44.2548 58.8791C46.8111 57.0334 66.6654 36.3021 53.849 37.3949C42.243 38.3844 36.7985 53.1087 36.7673 62.5332C36.7215 76.3709 51.0557 78.6989 62.3048 74.1115C83.3723 65.5204 93.9574 46.1137 100.676 26.5417" stroke="currentColor" stroke-linecap="round" stroke-width="2" style="${ssrRenderStyle({
		"fill": "rgb(255, 255, 255)",
		"fill-opacity": "0",
		"stroke": "rgb(0, 0, 0)"
	})}" transform="matrix(0.9999999999999999, 0, 0, 0.9999999999999999, 2.0752495397696578, -3.40787419626605)"></path></g></g></svg>`);
}
var _sfc_setup$11 = _sfc_main$11.setup;
_sfc_main$11.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/HeroArrow.vue");
	return _sfc_setup$11 ? _sfc_setup$11(props, ctx) : void 0;
};
var HeroArrow_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$11, [["ssrRender", _sfc_ssrRender$4]]);
//#endregion
//#region resources/js/Components/Organisms/Home/Hero.vue
var _sfc_main$10 = {
	__name: "Hero",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const heroContent = computed(() => page.props.cms.hero);
		const socials = computed(() => page.props.cms.socials);
		const ctaLabel = computed(() => page.props.translations.hero_cta_label);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(mergeProps({
				class: "relative",
				dir: "auto"
			}, _attrs))}><img${ssrRenderAttr("src", "/assets/svg/home-hero-gradient.svg")} alt="hero gradient" aria-hidden="true" class="absolute top-0 inset-s-0 w-full h-auto rtl:right-0 rtl:-rotate-180" decoding="async" fetchpriority="high" height="894" loading="eager" width="1728">`);
			_push(ssrRenderComponent(Section_default, null, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(`<div class="container mx-auto text-center lg:text-start"${_scopeId}><div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 xl:gap-24 items-center px-4 sm:px-8 md:px-12 lg:px-16"${_scopeId}><div class=""${_scopeId}>`);
						_push(ssrRenderComponent(Title_default, null, {
							default: withCtx((_, _push, _parent, _scopeId) => {
								if (_push) {
									_push(`<div class="relative text-primary-400 inline-flex mb-2"${_scopeId}>`);
									_push(ssrRenderComponent(Underline_default, { class: "absolute w-2/5 inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10" }, null, _parent, _scopeId));
									_push(`<span class="relative z-20 flex gap-2 text-black"${_scopeId}><span${_scopeId}>${ssrInterpolate(heroContent.value.kicker)}</span></span></div> ${ssrInterpolate(heroContent.value.title)}`);
								} else return [createVNode("div", { class: "relative text-primary-400 inline-flex mb-2" }, [createVNode(Underline_default, { class: "absolute w-2/5 inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10" }), createVNode("span", { class: "relative z-20 flex gap-2 text-black" }, [createVNode("span", { textContent: toDisplayString(heroContent.value.kicker) }, null, 8, ["textContent"])])]), createTextVNode(" " + toDisplayString(heroContent.value.title), 1)];
							}),
							_: 1
						}, _parent, _scopeId));
						_push(`<p class="mt-6 text-lg lg:text-xl text-gray-700"${_scopeId}>${heroContent.value.description ?? ""}</p><div class="mt-8 flex flex-col sm:flex-row items-center sm:items-start sm:justify-center lg:justify-start gap-4"${_scopeId}><button class="bg-secondary-950 py-2 px-6 border border-secondary-200 rounded-2xl transition-colors focus:outline-hidden hover:bg-primary-800 duration-75 hover:text-secondary-50"${_scopeId}><span class="capitalize font-semibold text-secondary-100"${_scopeId}>${ssrInterpolate(ctaLabel.value)}</span></button><div class="flex justify-center items-center gap-4"${_scopeId}><!--[-->`);
						ssrRenderList(socials.value, (social) => {
							_push(ssrRenderComponent(_sfc_main$15, {
								key: social.name,
								href: social.link,
								icon: social.icon,
								label: social.name,
								circle: "",
								color: "secondary",
								external: "",
								outline: ""
							}, null, _parent, _scopeId));
						});
						_push(`<!--]--></div></div></div><div class="relative flex justify-center mb-12 lg:mb-0"${_scopeId}><div class="hidden lg:block absolute -top-12 start-auto end-auto -translate-x-6 rtl:translate-x-10"${_scopeId}><p class="text-3xl -rotate-10 font-hand"${_scopeId}>${ssrInterpolate(heroContent.value.intro)}</p>`);
						_push(ssrRenderComponent(HeroArrow_default, null, null, _parent, _scopeId));
						_push(`</div><img is="image"${ssrRenderAttr("src", "/assets/images/portrait.webp")} alt="Hero Image" class="h-auto w-full max-w-105 rounded-xl object-cover shadow-xl md:max-w-120 lg:max-w-lg" decoding="async" fetchpriority="high" height="1280" loading="eager" sizes="(min-width: 1024px) 512px, (min-width: 768px) 480px, calc(100vw - 2rem)" width="853"${_scopeId}></div></div></div>`);
					} else return [createVNode("div", { class: "container mx-auto text-center lg:text-start" }, [createVNode("div", { class: "grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 xl:gap-24 items-center px-4 sm:px-8 md:px-12 lg:px-16" }, [createVNode("div", { class: "" }, [
						createVNode(Title_default, null, {
							default: withCtx(() => [createVNode("div", { class: "relative text-primary-400 inline-flex mb-2" }, [createVNode(Underline_default, { class: "absolute w-2/5 inset-x-0 bottom-0 translate-y-2 md:translate-y-3 lg:translate-y-3 z-10" }), createVNode("span", { class: "relative z-20 flex gap-2 text-black" }, [createVNode("span", { textContent: toDisplayString(heroContent.value.kicker) }, null, 8, ["textContent"])])]), createTextVNode(" " + toDisplayString(heroContent.value.title), 1)]),
							_: 1
						}),
						createVNode("p", {
							class: "mt-6 text-lg lg:text-xl text-gray-700",
							innerHTML: heroContent.value.description
						}, null, 8, ["innerHTML"]),
						createVNode("div", { class: "mt-8 flex flex-col sm:flex-row items-center sm:items-start sm:justify-center lg:justify-start gap-4" }, [createVNode("button", { class: "bg-secondary-950 py-2 px-6 border border-secondary-200 rounded-2xl transition-colors focus:outline-hidden hover:bg-primary-800 duration-75 hover:text-secondary-50" }, [createVNode("span", {
							class: "capitalize font-semibold text-secondary-100",
							textContent: toDisplayString(ctaLabel.value)
						}, null, 8, ["textContent"])]), createVNode("div", { class: "flex justify-center items-center gap-4" }, [(openBlock(true), createBlock(Fragment, null, renderList(socials.value, (social) => {
							return openBlock(), createBlock(_sfc_main$15, {
								key: social.name,
								href: social.link,
								icon: social.icon,
								label: social.name,
								circle: "",
								color: "secondary",
								external: "",
								outline: ""
							}, null, 8, [
								"href",
								"icon",
								"label"
							]);
						}), 128))])])
					]), createVNode("div", { class: "relative flex justify-center mb-12 lg:mb-0" }, [createVNode("div", { class: "hidden lg:block absolute -top-12 start-auto end-auto -translate-x-6 rtl:translate-x-10" }, [createVNode("p", {
						class: "text-3xl -rotate-10 font-hand",
						textContent: toDisplayString(heroContent.value.intro)
					}, null, 8, ["textContent"]), createVNode(HeroArrow_default)]), createVNode("img", {
						is: "image",
						src: "/assets/images/portrait.webp",
						alt: "Hero Image",
						class: "h-auto w-full max-w-105 rounded-xl object-cover shadow-xl md:max-w-120 lg:max-w-lg",
						decoding: "async",
						fetchpriority: "high",
						height: "1280",
						loading: "eager",
						sizes: "(min-width: 1024px) 512px, (min-width: 768px) 480px, calc(100vw - 2rem)",
						width: "853"
					})])])])];
				}),
				_: 1
			}, _parent));
			_push(`</div>`);
		};
	}
};
var _sfc_setup$10 = _sfc_main$10.setup;
_sfc_main$10.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/Hero.vue");
	return _sfc_setup$10 ? _sfc_setup$10(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Icons/FeatureArrow.vue
var _sfc_main$9 = {};
function _sfc_ssrRender$3(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		class: "rtl:-translate-x-16 rtl-skew-6",
		fill: "none",
		height: "83",
		viewBox: "0 0 81 83",
		width: "81",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><g clip-path="url(#clip0_112_68)"><path d="M79.0279 62.2024C58.1227 60.567 37.0551 52.8379 23.5836 35.8709C19.6389 30.9027 16.5994 23.913 14.6598 17.809C14.25 16.519 14.0629 15.1736 13.8444 13.8392C13.6447 12.6204 8.83154 19.8767 8.22696 20.6903C1.76323 29.3888 8.93024 20.1844 10.9563 16.5611C12.5286 13.7492 13.3857 10.1847 15.3992 7.63962C17.0205 5.59024 20.2035 9.67344 21.5513 10.8281C22.9371 12.0152 33.1749 18.4514 29.1817 20.1187C22.0175 23.1101 14.7009 22.4979 7.21764 22.9016" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path></g><defs><clipPath id="clip0_112_68"><rect fill="white" height="29" transform="translate(21.4469 0.837036) rotate(46.0556)" width="85"></rect></clipPath></defs></svg>`);
}
var _sfc_setup$9 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/FeatureArrow.vue");
	return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
var FeatureArrow_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$9, [["ssrRender", _sfc_ssrRender$3]]);
//#endregion
//#region resources/js/Components/Icons/CheckCircle.vue
var _sfc_main$8 = {};
function _sfc_ssrRender$2(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		class: "size-6",
		fill: "none",
		stroke: "currentColor",
		"stroke-width": "1.5",
		viewBox: "0 0 24 24",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round" stroke-linejoin="round"></path></svg>`);
}
var _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/CheckCircle.vue");
	return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
var CheckCircle_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$8, [["ssrRender", _sfc_ssrRender$2]]);
//#endregion
//#region resources/js/Components/Icons/RectangleStack.vue
var _sfc_main$7 = {};
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		class: "size-6",
		fill: "none",
		stroke: "currentColor",
		"stroke-width": "1.5",
		viewBox: "0 0 24 24",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" stroke-linecap="round" stroke-linejoin="round"></path></svg>`);
}
var _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/RectangleStack.vue");
	return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
var RectangleStack_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$7, [["ssrRender", _sfc_ssrRender$1]]);
//#endregion
//#region resources/js/Components/Icons/CodeBracket.vue
var _sfc_main$6 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		class: "size-6",
		fill: "none",
		stroke: "currentColor",
		"stroke-width": "1.5",
		viewBox: "0 0 24 24",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><path d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>`);
}
var _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/CodeBracket.vue");
	return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
var CodeBracket_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$6, [["ssrRender", _sfc_ssrRender]]);
//#endregion
//#region resources/js/Components/Organisms/Home/Features.vue
var _sfc_main$5 = {
	__name: "Features",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const featuresContent = computed(() => page.props.cms.features_section.features);
		const translations = computed(() => page.props.translations.features);
		const iconMap = {
			"heroicon-o-check-circle": CheckCircle_default,
			"heroicon-o-rectangle-stack": RectangleStack_default,
			"heroicon-o-code-bracket": CodeBracket_default
		};
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(_attrs)}>`);
			_push(ssrRenderComponent(Section_default, { class: "bg-slate-100" }, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(`<div class="container mx-auto text-center lg:text-start space-y-20"${_scopeId}><div class="grid grid-cols-1 xl:grid-cols-2 gap-10 md:gap-16 xl:gap-24 items-center px-4 sm:px-8 md:px-12 lg:px-16"${_scopeId}>`);
						_push(ssrRenderComponent(Subtitle_default, null, {
							default: withCtx((_, _push, _parent, _scopeId) => {
								if (_push) _push(`${ssrInterpolate(featuresContent.value.title)}`);
								else return [createTextVNode(toDisplayString(featuresContent.value.title), 1)];
							}),
							_: 1
						}, _parent, _scopeId));
						_push(`<p class="mt-6 text-lg lg:text-xl text-start text-gray-700"${_scopeId}>${featuresContent.value.description ?? ""}</p></div><div class="flex flex-col lg:flex-row gap-12 lg:gap-16 xl:gap-20 items-center px-4 sm:px-8 md:px-12 lg:px-16"${_scopeId}><div class="relative grid gap-10 md:gap-14 lg:gap-20 grid-cols-1"${_scopeId}><!--[-->`);
						ssrRenderList(featuresContent.value.items, (feature, index) => {
							_push(`<div class="flex items-start gap-6"${_scopeId}><div class="relative min-w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center"${_scopeId}>`);
							if (iconMap[feature.icon]) ssrRenderVNode(_push, createVNode(resolveDynamicComponent(iconMap[feature.icon]), { class: "text-secondary-100 w-6 h-6" }, null), _parent, _scopeId);
							else _push(`<!---->`);
							if (index !== featuresContent.value.items.length - 1) _push(`<div class="absolute top-20 w-px border-s-2 border-dotted border-secondary-300 h-full"${_scopeId}></div>`);
							else _push(`<!---->`);
							_push(`</div><div class="w-full md:w-3/4"${_scopeId}><h3 class="text-lg md:text-xl font-semibold text-start font-display"${_scopeId}>${ssrInterpolate(feature.title)}</h3><p class="mt-2 text-sm md:text-base text-gray-700 text-start"${_scopeId}>${ssrInterpolate(feature.description)}</p></div></div>`);
						});
						_push(`<!--]--><div class="hidden lg:block absolute -bottom-32 left-12"${_scopeId}><h4 class="text-xl w-[60%] translate-y-16 translate-x-20 -rotate-10 rtl:translate-y-20 rtl:translate-x-20"${_scopeId}>${ssrInterpolate(translations.value.caption)}</h4>`);
						_push(ssrRenderComponent(FeatureArrow_default, null, null, _parent, _scopeId));
						_push(`</div></div><div class="relative w-full flex justify-center"${_scopeId}><div class="relative inline-block"${_scopeId}><img is="image"${ssrRenderAttr("src", "/assets/images/feature_section.webp")} alt="Feature Image" class="w-full max-w-125 md:max-w-150 h-80 md:h-130 object-cover rounded-xl shadow-xl" decoding="async" fetchpriority="high" height="1280" loading="eager" sizes="(min-width: 1024px) 512px, (min-width: 768px) 480px, calc(100vw - 2rem)" width="853"${_scopeId}><img${ssrRenderAttr("src", "/assets/svg/star.svg")} alt="decorative star" class="absolute -top-5 -inset-e-6 w-8 md:w-12 lg:w-14 pointer-events-none select-none"${_scopeId}></div><div class="absolute bottom-4 inset-s-1/2 -translate-x-1/2 rtl:translate-x-1/2 md:start-auto md:inset-e-6 md:translate-x-0 rtl:md:translate-x-0"${_scopeId}><a${ssrRenderAttr("href", "assets/docs/Youcef_Nezrek_CV.pdf")} class="group flex items-center gap-3 bg-white/90 backdrop-blur px-3 py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-200" target="_blank"${_scopeId}><div class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-900 text-white"${_scopeId}>`);
						_push(ssrRenderComponent(DownloadSimple_default, { class: "w-5 h-5 group-hover:translate-y-0.5 transition" }, null, _parent, _scopeId));
						_push(`</div><div class="text-start"${_scopeId}><p class="text-sm font-semibold text-slate-900"${_scopeId}>${ssrInterpolate(translations.value.download_label)}</p><p class="text-xs text-gray-500"${_scopeId}>${ssrInterpolate(translations.value.view_experience_label)}</p></div></a></div></div></div></div>`);
					} else return [createVNode("div", { class: "container mx-auto text-center lg:text-start space-y-20" }, [createVNode("div", { class: "grid grid-cols-1 xl:grid-cols-2 gap-10 md:gap-16 xl:gap-24 items-center px-4 sm:px-8 md:px-12 lg:px-16" }, [createVNode(Subtitle_default, null, {
						default: withCtx(() => [createTextVNode(toDisplayString(featuresContent.value.title), 1)]),
						_: 1
					}), createVNode("p", {
						class: "mt-6 text-lg lg:text-xl text-start text-gray-700",
						innerHTML: featuresContent.value.description
					}, null, 8, ["innerHTML"])]), createVNode("div", { class: "flex flex-col lg:flex-row gap-12 lg:gap-16 xl:gap-20 items-center px-4 sm:px-8 md:px-12 lg:px-16" }, [createVNode("div", { class: "relative grid gap-10 md:gap-14 lg:gap-20 grid-cols-1" }, [(openBlock(true), createBlock(Fragment, null, renderList(featuresContent.value.items, (feature, index) => {
						return openBlock(), createBlock("div", { class: "flex items-start gap-6" }, [createVNode("div", { class: "relative min-w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center" }, [iconMap[feature.icon] ? (openBlock(), createBlock(resolveDynamicComponent(iconMap[feature.icon]), {
							key: 0,
							class: "text-secondary-100 w-6 h-6"
						})) : createCommentVNode("", true), index !== featuresContent.value.items.length - 1 ? (openBlock(), createBlock("div", {
							key: 1,
							class: "absolute top-20 w-px border-s-2 border-dotted border-secondary-300 h-full"
						})) : createCommentVNode("", true)]), createVNode("div", { class: "w-full md:w-3/4" }, [createVNode("h3", {
							class: "text-lg md:text-xl font-semibold text-start font-display",
							textContent: toDisplayString(feature.title)
						}, null, 8, ["textContent"]), createVNode("p", {
							class: "mt-2 text-sm md:text-base text-gray-700 text-start",
							textContent: toDisplayString(feature.description)
						}, null, 8, ["textContent"])])]);
					}), 256)), createVNode("div", { class: "hidden lg:block absolute -bottom-32 left-12" }, [createVNode("h4", {
						class: "text-xl w-[60%] translate-y-16 translate-x-20 -rotate-10 rtl:translate-y-20 rtl:translate-x-20",
						textContent: toDisplayString(translations.value.caption)
					}, null, 8, ["textContent"]), createVNode(FeatureArrow_default)])]), createVNode("div", { class: "relative w-full flex justify-center" }, [createVNode("div", { class: "relative inline-block" }, [createVNode("img", {
						is: "image",
						src: "/assets/images/feature_section.webp",
						alt: "Feature Image",
						class: "w-full max-w-125 md:max-w-150 h-80 md:h-130 object-cover rounded-xl shadow-xl",
						decoding: "async",
						fetchpriority: "high",
						height: "1280",
						loading: "eager",
						sizes: "(min-width: 1024px) 512px, (min-width: 768px) 480px, calc(100vw - 2rem)",
						width: "853"
					}), createVNode("img", {
						src: "/assets/svg/star.svg",
						alt: "decorative star",
						class: "absolute -top-5 -inset-e-6 w-8 md:w-12 lg:w-14 pointer-events-none select-none"
					})]), createVNode("div", { class: "absolute bottom-4 inset-s-1/2 -translate-x-1/2 rtl:translate-x-1/2 md:start-auto md:inset-e-6 md:translate-x-0 rtl:md:translate-x-0" }, [createVNode("a", {
						href: "assets/docs/Youcef_Nezrek_CV.pdf",
						class: "group flex items-center gap-3 bg-white/90 backdrop-blur px-3 py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-200",
						target: "_blank"
					}, [createVNode("div", { class: "w-10 h-10 flex items-center justify-center rounded-full bg-slate-900 text-white" }, [createVNode(DownloadSimple_default, { class: "w-5 h-5 group-hover:translate-y-0.5 transition" })]), createVNode("div", { class: "text-start" }, [createVNode("p", {
						class: "text-sm font-semibold text-slate-900",
						textContent: toDisplayString(translations.value.download_label)
					}, null, 8, ["textContent"]), createVNode("p", {
						class: "text-xs text-gray-500",
						textContent: toDisplayString(translations.value.view_experience_label)
					}, null, 8, ["textContent"])])])])])])])];
				}),
				_: 1
			}, _parent));
			_push(`</div>`);
		};
	}
};
var _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/Features.vue");
	return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Home/Tools.vue
var _sfc_main$4 = {
	__name: "Tools",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const caption = computed(() => page.props.translations.tools_section_caption);
		const tools = [
			{
				"src": "assets/svg/icons/php.svg",
				"alt": "PHP"
			},
			{
				"src": "assets/svg/icons/tailwindcss.svg",
				"alt": "Tailwind Css"
			},
			{
				"src": "assets/svg/icons/alpinejs.svg",
				"alt": "AlpineJs"
			},
			{
				"src": "assets/svg/icons/laravel.svg",
				"alt": "Laravel"
			},
			{
				"src": "assets/svg/icons/livewire.svg",
				"alt": "Livewire"
			},
			{
				"src": "assets/svg/icons/mysql.svg",
				"alt": "Mysql"
			},
			{
				"src": "assets/svg/icons/javascript.svg",
				"alt": "Javascript"
			},
			{
				"src": "assets/svg/icons/vue.svg",
				"alt": "VueJs"
			}
		];
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "relative flex flex-col items-center my-12 px-4 sm:px-6 lg:px-8" }, _attrs))}><div class="flex flex-wrap justify-center gap-x-4 sm:gap-x-8 lg:gap-x-12"><!--[-->`);
			ssrRenderList(tools, (tool, index) => {
				_push(`<div class="${ssrRenderClass([index % 4 === 0 ? "mt-3" : index % 4 === 1 ? "mt-6" : index % 4 === 2 ? "mt-9" : "mt-0", "relative min-w-20 h-20 bg-white shadow-xs rounded-full flex flex-col items-center justify-center"])}"><img${ssrRenderAttr("alt", tool.alt)}${ssrRenderAttr("src", tool.src)} class="h-8 w-8 sm:h-12 sm:w-12"></div>`);
			});
			_push(`<!--]--></div><div class="hidden lg:flex rtl:hidden absolute top-32 inset-e-0 items-start gap-1"><img${ssrRenderAttr("src", "assets/svg/tools.svg")} alt="arrow" class="h-12 w-12 sm:h-16 sm:w-16"><h3 class="text-xl w-[60%] relative top-8 rotate-10">${ssrInterpolate(caption.value)}</h3></div><div class="hidden lg:flex ltr:hidden absolute top-32 inset-e-0 items-start gap-1"><img${ssrRenderAttr("src", "assets/svg/tools_arrow_rtl.svg")} alt="arrow" class="h-12 w-12 sm:h-16 sm:w-16"><h3 class="text-xl w-[60%] relative top-2">${ssrInterpolate(caption.value)}</h3></div></section>`);
		};
	}
};
var _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/Tools.vue");
	return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Molecules/ProjectCard.vue
var _sfc_main$3 = {
	__name: "ProjectCard",
	__ssrInlineRender: true,
	props: { project: {
		type: Object,
		required: true
	} },
	setup(__props) {
		const props = __props;
		const zoom = ref(false);
		const formattedDates = computed(() => {
			const start = props.project.start_year;
			const end = props.project.end_year;
			if (!start) return null;
			if (end) return `${start} — ${end}`;
			if (props.project.is_in_progress) return `${start} — Present`;
			return start;
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(ssrRenderComponent(FadeContent_default, mergeProps({
				blur: true,
				delay: 200,
				duration: 1e3,
				"initial-opacity": 0,
				threshold: .1,
				"class-name": "my-fade-content",
				easing: "ease-out"
			}, _attrs), {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(`<article class="relative grid max-w-6xl grid-cols-1 gap-4 rounded-b-xl bg-slate-100 px-4 py-0 pt-4 md:h-140 md:pt-8 lg:gap-16 lg:px-0 lg:pt-14 xl:grid-cols-2 xl:pt-16"${_scopeId}><img${ssrRenderAttr("src", "/assets/svg/home-hero-gradient.svg")} alt="Background Gradient" class="absolute -top-10 -start-120 hidden rotate-180 rtl:end-120 rtl:start-auto rtl:scale-x-[-1] lg:block" height="794" loading="lazy" width="1528"${_scopeId}><div class="relative order-1 overflow-hidden rounded-tl-xl rounded-br-xl hover:cursor-pointer rtl:rounded-bl-xl rtl:rounded-br-none rtl:rounded-tl-none rtl:rounded-tr-xl xl:order-2"${_scopeId}><img is="image"${ssrRenderAttr("alt", __props.project.header)} class="${ssrRenderClass([{ "scale-110": zoom.value }, "h-full transition-transform duration-500 ease-in-out"])}"${ssrRenderAttr("src", __props.project.logo_url)} aria-hidden="true" decoding="async" fetchpriority="high" loading="eager"${_scopeId}></div><div class="order-2 grid gap-5 p-4 sm:pe-4 sm:ps-16 sm:pb-24 sm:pt-8 xl:order-1"${_scopeId}><div class="flex flex-wrap items-center gap-3 text-xs uppercase tracking-widest"${_scopeId}><span class="rounded-md border border-gray-300 px-2 py-1 font-medium text-gray-600"${_scopeId}>${ssrInterpolate(__props.project.type_label)}</span><div class="flex items-center gap-2 text-gray-400"${_scopeId}><!--[-->`);
						ssrRenderList(__props.project.role_labels, (role, index) => {
							_push(`<!--[--><span${_scopeId}>${ssrInterpolate(role)}</span>`);
							if (index !== __props.project.role_labels.length - 1) _push(`<span class="opacity-30"${_scopeId}> • </span>`);
							else _push(`<!---->`);
							_push(`<!--]-->`);
						});
						_push(`<!--]--></div>`);
						if (__props.project.is_in_progress) _push(`<span class="rounded-md bg-amber-100 px-2 py-1 normal-case tracking-normal text-amber-600"${_scopeId}> In Progress </span>`);
						else _push(`<!---->`);
						_push(`</div><h3 class="text-start text-xl font-semibold leading-snug lg:text-2xl font-display"${_scopeId}>${ssrInterpolate(__props.project.header)}</h3><p class="line-clamp-3 text-start leading-relaxed text-gray-600"${_scopeId}>${__props.project.description ?? ""}</p><div class="mt-2 flex flex-col items-start gap-4"${_scopeId}>`);
						if (formattedDates.value) _push(`<div class="flex items-center gap-1 text-xs text-gray-400"${_scopeId}>${ssrInterpolate(formattedDates.value)}</div>`);
						else _push(`<!---->`);
						_push(ssrRenderComponent(_sfc_main$17, {
							"is-package": __props.project.is_package,
							"project-id": __props.project.id,
							"project-title": __props.project.header,
							url: __props.project.project_url
						}, null, _parent, _scopeId));
						_push(`</div></div></article>`);
					} else return [createVNode("article", { class: "relative grid max-w-6xl grid-cols-1 gap-4 rounded-b-xl bg-slate-100 px-4 py-0 pt-4 md:h-140 md:pt-8 lg:gap-16 lg:px-0 lg:pt-14 xl:grid-cols-2 xl:pt-16" }, [
						createVNode("img", {
							src: "/assets/svg/home-hero-gradient.svg",
							alt: "Background Gradient",
							class: "absolute -top-10 -start-120 hidden rotate-180 rtl:end-120 rtl:start-auto rtl:scale-x-[-1] lg:block",
							height: "794",
							loading: "lazy",
							width: "1528"
						}),
						createVNode("div", {
							class: "relative order-1 overflow-hidden rounded-tl-xl rounded-br-xl hover:cursor-pointer rtl:rounded-bl-xl rtl:rounded-br-none rtl:rounded-tl-none rtl:rounded-tr-xl xl:order-2",
							onMouseenter: ($event) => zoom.value = true,
							onMouseleave: ($event) => zoom.value = false
						}, [createVNode("img", {
							is: "image",
							alt: __props.project.header,
							class: [{ "scale-110": zoom.value }, "h-full transition-transform duration-500 ease-in-out"],
							src: __props.project.logo_url,
							"aria-hidden": "true",
							decoding: "async",
							fetchpriority: "high",
							loading: "eager"
						}, null, 10, ["alt", "src"])], 40, ["onMouseenter", "onMouseleave"]),
						createVNode("div", { class: "order-2 grid gap-5 p-4 sm:pe-4 sm:ps-16 sm:pb-24 sm:pt-8 xl:order-1" }, [
							createVNode("div", { class: "flex flex-wrap items-center gap-3 text-xs uppercase tracking-widest" }, [
								createVNode("span", {
									class: "rounded-md border border-gray-300 px-2 py-1 font-medium text-gray-600",
									textContent: toDisplayString(__props.project.type_label)
								}, null, 8, ["textContent"]),
								createVNode("div", { class: "flex items-center gap-2 text-gray-400" }, [(openBlock(true), createBlock(Fragment, null, renderList(__props.project.role_labels, (role, index) => {
									return openBlock(), createBlock(Fragment, { key: role }, [createVNode("span", null, toDisplayString(role), 1), index !== __props.project.role_labels.length - 1 ? (openBlock(), createBlock("span", {
										key: 0,
										class: "opacity-30"
									}, " • ")) : createCommentVNode("", true)], 64);
								}), 128))]),
								__props.project.is_in_progress ? (openBlock(), createBlock("span", {
									key: 0,
									class: "rounded-md bg-amber-100 px-2 py-1 normal-case tracking-normal text-amber-600"
								}, " In Progress ")) : createCommentVNode("", true)
							]),
							createVNode("h3", { class: "text-start text-xl font-semibold leading-snug lg:text-2xl font-display" }, toDisplayString(__props.project.header), 1),
							createVNode("p", {
								class: "line-clamp-3 text-start leading-relaxed text-gray-600",
								innerHTML: __props.project.description
							}, null, 8, ["innerHTML"]),
							createVNode("div", { class: "mt-2 flex flex-col items-start gap-4" }, [formattedDates.value ? (openBlock(), createBlock("div", {
								key: 0,
								class: "flex items-center gap-1 text-xs text-gray-400"
							}, toDisplayString(formattedDates.value), 1)) : createCommentVNode("", true), createVNode(_sfc_main$17, {
								"is-package": __props.project.is_package,
								"project-id": __props.project.id,
								"project-title": __props.project.header,
								url: __props.project.project_url
							}, null, 8, [
								"is-package",
								"project-id",
								"project-title",
								"url"
							])])
						])
					])];
				}),
				_: 1
			}, _parent));
		};
	}
};
var _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Molecules/ProjectCard.vue");
	return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Home/LatestWork.vue
var _sfc_main$2 = {
	__name: "LatestWork",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const content = computed(() => {
			return page.props.cms.work_section.content;
		});
		const projects = computed(() => {
			return page.props.cms.work_section.latest_projects;
		});
		console.log(projects);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(_attrs)}>`);
			_push(ssrRenderComponent(Section_default, { class: "mt-16" }, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(`<div class="container mx-auto space-y-20 text-center lg:text-left"${_scopeId}><div class="flex flex-col items-center"${_scopeId}>`);
						_push(ssrRenderComponent(Subtitle_default, { class: "leading-loose" }, null, _parent, _scopeId));
						_push(`<div class="wrap-break-word px-2 text-center md:px-20 lg:px-48 xl:px-96"${_scopeId}><p class="mt-6 text-lg text-gray-700 lg:text-xl"${_scopeId}>${content.value.description ?? ""}</p></div></div><div class="mt-20 grid justify-center gap-10 px-10 sm:px-16"${_scopeId}><!--[-->`);
						ssrRenderList(projects.value, (project) => {
							_push(ssrRenderComponent(_sfc_main$3, {
								key: project.id,
								project
							}, null, _parent, _scopeId));
						});
						_push(`<!--]--></div></div>`);
					} else return [createVNode("div", { class: "container mx-auto space-y-20 text-center lg:text-left" }, [createVNode("div", { class: "flex flex-col items-center" }, [createVNode(Subtitle_default, {
						class: "leading-loose",
						innerHTML: content.value.title
					}, null, 8, ["innerHTML"]), createVNode("div", { class: "wrap-break-word px-2 text-center md:px-20 lg:px-48 xl:px-96" }, [createVNode("p", {
						class: "mt-6 text-lg text-gray-700 lg:text-xl",
						innerHTML: content.value.description
					}, null, 8, ["innerHTML"])])]), createVNode("div", { class: "mt-20 grid justify-center gap-10 px-10 sm:px-16" }, [(openBlock(true), createBlock(Fragment, null, renderList(projects.value, (project) => {
						return openBlock(), createBlock(_sfc_main$3, {
							key: project.id,
							project
						}, null, 8, ["project"]);
					}), 128))])])];
				}),
				_: 1
			}, _parent));
			_push(`</div>`);
		};
	}
};
var _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/LatestWork.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Home/Companies.vue
var _sfc_main$1 = {
	__name: "Companies",
	__ssrInlineRender: true,
	setup(__props) {
		const page = usePage();
		const content = computed(() => page.props.cms.companies_section.content);
		const companies = computed(() => page.props.cms.companies_section.companies);
		const hoveredCompany = ref(null);
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "mb-16 mt-12 bg-slate-100 p-4 sm:p-6 lg:p-8" }, _attrs))}><div class="container mx-auto text-center lg:text-start"><div class="relative flex items-start justify-center lg:justify-start"><h3 class="max-w-xs text-2xl font-semibold leading-snug sm:max-w-sm sm:text-3xl lg:max-w-md lg:text-4xl">${ssrInterpolate(content.value.title)} <span class="text-primary-700">${ssrInterpolate(content.value.highlight)}</span> ${ssrInterpolate(content.value.suffix)}</h3><img${ssrRenderAttr("src", "/assets/svg/companies.svg")} alt="" class="h-12 w-12 shrink-0 rtl:hidden sm:h-16 sm:w-16 lg:h-20 lg:w-20"><img${ssrRenderAttr("src", "/assets/svg/companies-right.svg")} alt="" class="h-12 w-12 shrink-0 ltr:hidden sm:h-16 sm:w-16 lg:h-20 lg:w-20"></div><div class="grid grid-cols-2 gap-2 px-0 py-6 sm:grid-cols-3 sm:gap-3 sm:px-4 sm:py-8 md:grid-cols-4 lg:grid-cols-5 lg:px-8 lg:py-10 xl:py-14"><!--[-->`);
			ssrRenderList(companies.value, (company) => {
				_push(`<a${ssrRenderAttr("href", company.website)} class="group flex flex-col items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white/60 px-3 py-3 transition-all duration-300 hover:-translate-y-0.5 hover:bg-white hover:shadow-md sm:flex-row sm:px-4 sm:py-4 lg:px-6" rel="noopener noreferrer" target="_blank"><img${ssrRenderAttr("alt", company.name)} class="${ssrRenderClass([{
					"scale-110": hoveredCompany.value === company.id,
					"group-hover:scale-110": hoveredCompany.value !== company.id
				}, "h-7 w-7 object-contain transition-transform duration-300 ease-[cubic-bezier(0.4,0,0.2,1)] sm:h-9 sm:w-9 lg:h-10 lg:w-10"])}"${ssrRenderAttr("src", company.logo_url)}><h2 class="text-center text-xs font-semibold leading-tight text-slate-900 sm:text-sm lg:text-base">${ssrInterpolate(company.name)}</h2></a>`);
			});
			_push(`<!--]--></div></div></section>`);
		};
	}
};
var _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/Companies.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Pages/HomeView.vue
var _sfc_main = {
	__name: "HomeView",
	__ssrInlineRender: true,
	setup(__props) {
		const title = useGetTitle("home");
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<!--[-->`);
			_push(ssrRenderComponent(unref(Head), { title: unref(title) }, null, _parent));
			_push(ssrRenderComponent(_sfc_main$16, null, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(ssrRenderComponent(_sfc_main$10, null, null, _parent, _scopeId));
						_push(ssrRenderComponent(_sfc_main$5, null, null, _parent, _scopeId));
						_push(ssrRenderComponent(_sfc_main$4, null, null, _parent, _scopeId));
						_push(ssrRenderComponent(_sfc_main$2, null, null, _parent, _scopeId));
						_push(ssrRenderComponent(_sfc_main$1, null, null, _parent, _scopeId));
					} else return [
						createVNode(_sfc_main$10),
						createVNode(_sfc_main$5),
						createVNode(_sfc_main$4),
						createVNode(_sfc_main$2),
						createVNode(_sfc_main$1)
					];
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
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/HomeView.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
export { _sfc_main as default };

//# sourceMappingURL=HomeView-CCG_QWuY.js.map