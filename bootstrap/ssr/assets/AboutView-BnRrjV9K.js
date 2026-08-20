import { n as _plugin_vue_export_helper_default, t as Subtitle_default } from "./Subtitle-DtkDPELn.js";
import { t as DownloadSimple_default } from "./DownloadSimple-HqfXmc8B.js";
import { n as _sfc_main$5, t as useGetTitle } from "./useGetTitle-CyfCBCJx.js";
import { createTextVNode, createVNode, mergeProps, toDisplayString, unref, useSSRContext, withCtx } from "vue";
import { Head } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderComponent, ssrRenderList, ssrRenderStyle } from "vue/server-renderer";
//#region resources/js/Components/Icons/CirclesBackground.vue
var _sfc_main$4 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
	_push(`<svg${ssrRenderAttrs(mergeProps({
		class: "absolute bottom-12 sm:bottom-20 md:bottom-24 lg:bottom-24 -start-10 sm:-start-12 md:-start-16 lg:-start-24 w-[220px] sm:w-[280px] md:w-[340px] lg:w-[460px] opacity-[0.08] sm:opacity-[0.09] md:opacity-[0.1] lg:opacity-[0.04] blur-[0.5px] pointer-events-none z-0",
		fill: "none",
		viewBox: "0 0 380 380",
		xmlns: "http://www.w3.org/2000/svg"
	}, _attrs))}><g class="text-primary-500" stroke="currentColor"><circle cx="190" cy="190" r="20" stroke-width="1.5"></circle><circle cx="190" cy="190" r="38" stroke-width="1.4"></circle><circle cx="190" cy="190" r="58" stroke-width="1.3"></circle><circle cx="190" cy="190" r="80" stroke-width="1.3"></circle><circle cx="190" cy="190" r="103" stroke-width="1.2"></circle><circle cx="190" cy="190" r="128" stroke-width="1.2"></circle><circle cx="190" cy="190" r="155" stroke-width="1.1"></circle><circle cx="190" cy="190" r="184" stroke-width="1.1"></circle><circle cx="190" cy="190" r="215" stroke-width="1.0"></circle><circle cx="190" cy="190" r="248" stroke-width="1.0"></circle><circle cx="190" cy="190" r="283" stroke-width="0.9"></circle><circle cx="190" cy="190" r="320" stroke-width="0.9"></circle><circle cx="190" cy="190" r="360" stroke-width="0.8"></circle></g></svg>`);
}
var _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Icons/CirclesBackground.vue");
	return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
var CirclesBackground_default = /*#__PURE__*/ _plugin_vue_export_helper_default(_sfc_main$4, [["ssrRender", _sfc_ssrRender]]);
//#endregion
//#region resources/js/Components/Organisms/About/Intro.vue
var _sfc_main$3 = {
	__name: "Intro",
	__ssrInlineRender: true,
	props: { intro: {
		type: Object,
		required: true
	} },
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "bg-slate-100 overflow-hidden" }, _attrs))}><div class="grid grid-cols-1 lg:grid-cols-[65fr_35fr] min-h-220"><div class="relative flex flex-col justify-center px-6 sm:px-8 md:px-12 lg:ps-24 lg:pe-12 xl:ps-32 xl:pe-16 max-w-5xl py-16 lg:py-0 z-10 overflow-hidden">`);
			_push(ssrRenderComponent(CirclesBackground_default, null, null, _parent));
			_push(`<div class="relative z-10">`);
			_push(ssrRenderComponent(Subtitle_default, null, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(`${ssrInterpolate(__props.intro.title)} <span class="text-primary-700"${_scopeId}>${ssrInterpolate(__props.intro.highlight)}</span> ${ssrInterpolate(__props.intro.subtitle)}`);
					else return [
						createTextVNode(toDisplayString(__props.intro.title) + " ", 1),
						createVNode("span", {
							class: "text-primary-700",
							textContent: toDisplayString(__props.intro.highlight)
						}, null, 8, ["textContent"]),
						createTextVNode(" " + toDisplayString(__props.intro.subtitle), 1)
					];
				}),
				_: 1
			}, _parent));
			if (__props.intro.paragraphs.length > 0) {
				_push(`<!--[-->`);
				ssrRenderList(__props.intro.paragraphs, (paragraph, index) => {
					_push(`<p class="text-base sm:text-lg md:text-xl leading-[1.9] text-gray-600 mt-6 text-start">${ssrInterpolate(paragraph)}</p>`);
				});
				_push(`<!--]-->`);
			} else _push(`<!---->`);
			_push(`<h3 class="text-3xl mt-12 text-start font-script">${ssrInterpolate(__props.intro.signature)}</h3></div></div><div class="relative hidden lg:block"><img${ssrRenderAttr("src", "/assets/images/portrait-2.webp")} alt="Portrait" class="absolute inset-0 w-full h-full object-cover object-top" style="${ssrRenderStyle({ "filter": "grayscale(15%) contrast(1.05)" })}"><img${ssrRenderAttr("src", "/assets/svg/about.svg")} alt="" class="absolute bottom-4 inset-s-0 -translate-x-1/3 rtl:translate-x-1/3 w-90 lg:w-115 xl:w-130 opacity-80 pointer-events-none select-none rtl:scale-x-[-1]"></div></div><div class="block lg:hidden w-full relative overflow-hidden"><div class="relative h-80 sm:h-95 md:h-105"><img${ssrRenderAttr("src", "/assets/images/portrait-2.webp")} alt="Portrait" class="absolute inset-0 w-full h-full object-cover object-top" style="${ssrRenderStyle({ "filter": "grayscale(15%) contrast(1.05)" })}"><img${ssrRenderAttr("src", "/assets/svg/about.svg")} alt="" class="absolute bottom-0 inset-s-0 -translate-x-1/3 rtl:translate-x-1/3 w-65 sm:w-[320px] md:w-95 opacity-70 pointer-events-none rtl:scale-x-[-1]"></div></div></section>`);
		};
	}
};
var _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/About/Intro.vue");
	return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/About/Careers.vue
var _sfc_main$2 = {
	__name: "Careers",
	__ssrInlineRender: true,
	props: { careers: {
		type: Object,
		required: true
	} },
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "container mx-auto text-start mt-16 md:mt-0" }, _attrs))}><div class="grid grid-cols-1 lg:grid-cols-5 xl:gap-12"><div class="col-span-2 lg:ps-32 xl:ps-48 py-4 lg:py-32">`);
			_push(ssrRenderComponent(Subtitle_default, null, null, _parent));
			_push(`<p class="mt-6 text-sm lg:text-base text-gray-700">${ssrInterpolate(__props.careers.content.description)}</p><a${ssrRenderAttr("href", "assets/docs/Youcef_Nezrek_CV.pdf")} class="flex gap-2 items-center w-1/2 bg-slate-100 mt-6 py-2 px-6 border rounded-2xl focus:outline-none"><span class="capitalize font-semibold text-secondary-900">${ssrInterpolate(__props.careers.download_label)}</span>`);
			_push(ssrRenderComponent(DownloadSimple_default, {
				class: "h-5 w-5 transform transition-transform duration-300 group-hover:-translate-y-0.5",
				name: "download-simple"
			}, null, _parent));
			_push(`</a></div><ol class="col-span-3 py-4 lg:py-32 lg:pe-28 xl:pe-36 grid grid-cols-1 md:grid-cols-2 gap-6">`);
			if (__props.careers.jobs.data.length > 0) {
				_push(`<!--[-->`);
				ssrRenderList(__props.careers.jobs.data, (job, index) => {
					_push(`<div class="relative p-4 rounded-lg"><div class="flex flex-col mb-2 space-y-6"><div class="p-2 rounded-lg border border-slate-200 bg-slate-100 max-w-fit"><img${ssrRenderAttr("alt", job.company.name + "-logo")}${ssrRenderAttr("src", job.company.logo)} class="w-6 h-6"></div><span class="font-semibold text-sm leading-5 text-primary-700">${ssrInterpolate(job.duration)}</span><span class="absolute text-[6rem] font-bold font-mono text-slate-100 inset-e-1 -top-8">${ssrInterpolate(String(index + 1).padStart(2, "0"))}</span></div><h2 class="text-xl font-bold capitalize">${ssrInterpolate(job.company.name)}</h2><p class="mt-6 text-sm lg:text-base text-gray-700">${job.description ?? ""}</p></div>`);
				});
				_push(`<!--]-->`);
			} else _push(`<!---->`);
			_push(`</ol></div></section>`);
		};
	}
};
var _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/About/Careers.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/About/Stack.vue
var portrait_url = "/assets/images/portrait-3.webp";
var _sfc_main$1 = {
	__name: "Stack",
	__ssrInlineRender: true,
	props: { stack: {
		type: Object,
		required: true
	} },
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "container mx-auto text-start pb-6 mt-16 md:mt-0" }, _attrs))}><div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 xl:gap-32 px-4 md:px-16 lg:px-32 xl:px-48 md:py-12 lg:py-24 xl:py-32"><div class="order-2 lg:order-1 rtl:lg:order-2"><img${ssrRenderAttr("src", portrait_url)} alt="About Image" class="rounded-2xl" sizes="(min-width: 1024px) 33vw, 100vw"></div><div class="order-1 lg:order-2 rtl:lg:order-1">`);
			_push(ssrRenderComponent(Subtitle_default, null, null, _parent));
			_push(`<p class="mt-6 text-lg lg:text-xl text-gray-700">${ssrInterpolate(__props.stack.content.description)}</p><div class="mt-6 grid grid-cols-2 gap-4">`);
			if (__props.stack.tools.length > 0) {
				_push(`<!--[-->`);
				ssrRenderList(__props.stack.tools, (tool, index) => {
					_push(`<div class="flex gap-4 items-center p-4 border rounded-lg bg-slate-100"><img${ssrRenderAttr("alt", tool.alt)}${ssrRenderAttr("src", tool.src)} aria-hidden="true" class="h-8 w-8 sm:h-12 sm:w-12"><h3 class="text-lg font-semibold">${ssrInterpolate(tool.alt)}</h3></div>`);
				});
				_push(`<!--]-->`);
			} else _push(`<!---->`);
			_push(`</div></div></div></section>`);
		};
	}
};
var _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/About/Stack.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Pages/AboutView.vue
var _sfc_main = {
	__name: "AboutView",
	__ssrInlineRender: true,
	props: {
		intro: {
			type: Object,
			required: true
		},
		careers: {
			type: Object,
			required: true
		},
		stack: {
			type: Object,
			required: true
		}
	},
	setup(__props) {
		const title = useGetTitle("about");
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<!--[-->`);
			_push(ssrRenderComponent(unref(Head), { title: unref(title) }, null, _parent));
			_push(ssrRenderComponent(_sfc_main$5, null, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(ssrRenderComponent(_sfc_main$3, { intro: __props.intro }, null, _parent, _scopeId));
						_push(ssrRenderComponent(_sfc_main$2, { careers: __props.careers }, null, _parent, _scopeId));
						_push(ssrRenderComponent(_sfc_main$1, { stack: __props.stack }, null, _parent, _scopeId));
					} else return [
						createVNode(_sfc_main$3, { intro: __props.intro }, null, 8, ["intro"]),
						createVNode(_sfc_main$2, { careers: __props.careers }, null, 8, ["careers"]),
						createVNode(_sfc_main$1, { stack: __props.stack }, null, 8, ["stack"])
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
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/AboutView.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
export { _sfc_main as default };

//# sourceMappingURL=AboutView-BnRrjV9K.js.map