import { n as _sfc_main$4, t as useGetTitle } from "./useGetTitle-CyfCBCJx.js";
import { Fragment, computed, createBlock, createCommentVNode, createVNode, mergeProps, openBlock, renderList, unref, useSSRContext, withCtx } from "vue";
import { Head, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderComponent, ssrRenderList } from "vue/server-renderer";
//#region resources/js/Components/Organisms/Projects/Testimonials.vue
var _sfc_main$3 = {
	__name: "Testimonials",
	__ssrInlineRender: true,
	props: { testimonials: {
		type: Array,
		required: true
	} },
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "mx-auto max-w-6xl px-6 pb-24" }, _attrs))}><div class="grid gap-8 md:grid-cols-2"><!--[-->`);
			ssrRenderList(__props.testimonials, (testimonial) => {
				_push(`<article class="rounded-2xl bg-slate-100 p-8"><p class="mb-6 text-gray-700">${ssrInterpolate(testimonial.content)}</p><div><p class="font-semibold text-gray-900">${ssrInterpolate(testimonial.author)}</p><p class="text-sm text-gray-500">${ssrInterpolate(testimonial.position)}</p></div></article>`);
			});
			_push(`<!--]--></div></section>`);
		};
	}
};
var _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Projects/Testimonials.vue");
	return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Projects/ProjectHero.vue
var _sfc_main$2 = {
	__name: "ProjectHero",
	__ssrInlineRender: true,
	props: { project: {
		type: Object,
		required: true
	} },
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "mx-auto max-w-6xl px-6 pb-20 pt-28" }, _attrs))}><div class="mb-8 flex flex-wrap items-center gap-3"><span class="rounded-full bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-900">${ssrInterpolate(__props.project.type_label)}</span><!--[-->`);
			ssrRenderList(__props.project.role_labels, (role) => {
				_push(`<span class="rounded-full bg-white px-4 py-2 text-sm text-gray-700 ring-1 ring-gray-200 transition hover:bg-gray-50">${ssrInterpolate(role)}</span>`);
			});
			_push(`<!--]--></div>`);
			if (__props.project.tech_tags?.length) {
				_push(`<div class="mb-8 flex flex-wrap gap-3"><!--[-->`);
				ssrRenderList(__props.project.tech_tags, (tag) => {
					_push(`<span class="rounded-full bg-gray-200 px-4 py-2 text-sm text-gray-700">${ssrInterpolate(tag)}</span>`);
				});
				_push(`<!--]--></div>`);
			} else _push(`<!---->`);
			_push(`<h1 class="max-w-5xl text-4xl font-semibold tracking-tight text-gray-900 md:text-6xl">${ssrInterpolate(__props.project.header)}</h1></section>`);
		};
	}
};
var _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Projects/ProjectHero.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Projects/ProjectContent.vue
var _sfc_main$1 = {
	__name: "ProjectContent",
	__ssrInlineRender: true,
	props: { project: {
		type: Object,
		required: true
	} },
	setup(__props) {
		const props = __props;
		const page = usePage();
		const translations = computed(() => {
			return page.props.translations.projects;
		});
		const ctaTranslation = computed(() => {
			return page.props.translations.actions.visit_project;
		});
		const companyHost = computed(() => {
			const website = props.project.company?.website;
			if (!website) return null;
			try {
				return new URL(website).hostname.replace(/^www\./, "");
			} catch {
				return website;
			}
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "mx-auto grid max-w-6xl grid-cols-1 gap-16 px-6 py-24 md:grid-cols-3" }, _attrs))}><aside class="space-y-8 text-sm text-gray-600"><div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.client)}</p><p>${ssrInterpolate(__props.project.company?.name ?? translations.value.personal_project)}</p></div>`);
			if (__props.project.company?.industry) _push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.industry)}</p><p>${ssrInterpolate(__props.project.company.industry)}</p></div>`);
			else _push(`<!---->`);
			if (__props.project.company?.size) _push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.company_size)}</p><p>${ssrInterpolate(__props.project.company.size)}</p></div>`);
			else _push(`<!---->`);
			if (__props.project.company?.headquarter) _push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.headquarters)}</p><p>${ssrInterpolate(__props.project.company.headquarter)}</p></div>`);
			else _push(`<!---->`);
			_push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.duration)}</p><p>${ssrInterpolate(__props.project.start)} `);
			if (__props.project.end) _push(`<!--[--> — ${ssrInterpolate(__props.project.end)}<!--]-->`);
			else if (__props.project.is_in_progress) _push(`<!--[--> — ${ssrInterpolate(translations.value.present)}<!--]-->`);
			else _push(`<!---->`);
			_push(`</p></div>`);
			if (companyHost.value) _push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.website)}</p><a${ssrRenderAttr("href", __props.project.company.website)} class="text-gray-700 hover:underline" rel="noopener noreferrer" target="_blank">${ssrInterpolate(companyHost.value)}</a></div>`);
			else _push(`<!---->`);
			if (__props.project.link) _push(`<div><a${ssrRenderAttr("href", __props.project.link)} class="inline-flex items-center rounded-full bg-gray-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-gray-800" rel="noopener noreferrer" target="_blank">${ssrInterpolate(ctaTranslation.value)} <svg class="ms-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H8M17 7V16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg></a></div>`);
			else _push(`<!---->`);
			_push(`</aside><div class="space-y-10 text-gray-700 md:col-span-2"><div class="text-xl font-medium leading-relaxed text-gray-900">${__props.project.description ?? ""}</div><div class="prose prose-lg max-w-none prose-gray">${__props.project.details ?? ""}</div></div></section>`);
		};
	}
};
var _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Projects/ProjectContent.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Pages/Projects/ShowView.vue
var _sfc_main = {
	__name: "ShowView",
	__ssrInlineRender: true,
	props: { project: {
		type: Object,
		required: true
	} },
	setup(__props) {
		const title = useGetTitle("project");
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<!--[-->`);
			_push(ssrRenderComponent(unref(Head), { title: unref(title) }, null, _parent));
			_push(ssrRenderComponent(_sfc_main$4, null, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(ssrRenderComponent(_sfc_main$2, { project: __props.project.data }, null, _parent, _scopeId));
						if (__props.project.data.logo_url) _push(`<section class="mx-auto max-w-7xl"${_scopeId}><img${ssrRenderAttr("alt", __props.project.data.header)}${ssrRenderAttr("src", __props.project.data.logo_url)} class="w-full rounded-xl object-cover"${_scopeId}></section>`);
						else _push(`<!---->`);
						_push(ssrRenderComponent(_sfc_main$1, { project: __props.project.data }, null, _parent, _scopeId));
						if (__props.project.data.gallery?.length) {
							_push(`<section class="mx-auto grid max-w-7xl gap-8 px-6 pb-24 md:grid-cols-2"${_scopeId}><!--[-->`);
							ssrRenderList(__props.project.data.gallery, (image) => {
								_push(`<img${ssrRenderAttr("alt", __props.project.data.header)}${ssrRenderAttr("src", image.url)} class="w-full rounded-lg"${_scopeId}>`);
							});
							_push(`<!--]--></section>`);
						} else _push(`<!---->`);
						if (__props.project.data.testimonials?.length) _push(ssrRenderComponent(_sfc_main$3, { testimonials: __props.project.data.testimonials }, null, _parent, _scopeId));
						else _push(`<!---->`);
					} else return [
						createVNode(_sfc_main$2, { project: __props.project.data }, null, 8, ["project"]),
						__props.project.data.logo_url ? (openBlock(), createBlock("section", {
							key: 0,
							class: "mx-auto max-w-7xl"
						}, [createVNode("img", {
							alt: __props.project.data.header,
							src: __props.project.data.logo_url,
							class: "w-full rounded-xl object-cover"
						}, null, 8, ["alt", "src"])])) : createCommentVNode("", true),
						createVNode(_sfc_main$1, { project: __props.project.data }, null, 8, ["project"]),
						__props.project.data.gallery?.length ? (openBlock(), createBlock("section", {
							key: 1,
							class: "mx-auto grid max-w-7xl gap-8 px-6 pb-24 md:grid-cols-2"
						}, [(openBlock(true), createBlock(Fragment, null, renderList(__props.project.data.gallery, (image) => {
							return openBlock(), createBlock("img", {
								key: image.url,
								alt: __props.project.data.header,
								src: image.url,
								class: "w-full rounded-lg"
							}, null, 8, ["alt", "src"]);
						}), 128))])) : createCommentVNode("", true),
						__props.project.data.testimonials?.length ? (openBlock(), createBlock(_sfc_main$3, {
							key: 2,
							testimonials: __props.project.data.testimonials
						}, null, 8, ["testimonials"])) : createCommentVNode("", true)
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
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Projects/ShowView.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
export { _sfc_main as default };

//# sourceMappingURL=ShowView-DTp3QcWA.js.map