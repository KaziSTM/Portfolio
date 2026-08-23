import { t as Subtitle_default } from "./Subtitle-DtkDPELn.js";
import { t as Section_default } from "./Section-CcmBDABV.js";
import { n as _sfc_main$2, t as FadeContent_default } from "./FadeContent-De5gdw3Q.js";
import { Fragment, computed, createBlock, createCommentVNode, createVNode, mergeProps, openBlock, ref, renderList, toDisplayString, useSSRContext, withCtx } from "vue";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderComponent, ssrRenderList } from "vue/server-renderer";
//#region resources/js/Components/Molecules/ProjectCard.vue
var _sfc_main$1 = {
	__name: "ProjectCard",
	__ssrInlineRender: true,
	props: {
		project: {
			type: Object,
			required: true
		},
		translations: {
			type: Object,
			required: true
		}
	},
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
						_push(`<article class="relative grid max-w-6xl grid-cols-1 gap-4 rounded-b-xl bg-slate-100 px-4 py-0 md:h-120 lg:gap-16 lg:px-0 xl:grid-cols-2"${_scopeId}><div class="relative order-1 overflow-hidden rounded-tl-xl rounded-br-xl hover:cursor-pointer rtl:rounded-bl-xl rtl:rounded-br-none rtl:rounded-tl-none rtl:rounded-tr-xl xl:order-2 h-full"${_scopeId}><img${ssrRenderAttr("alt", __props.project.header)} class="${ssrRenderClass([{ "scale-110": zoom.value }, "h-full w-full transition-transform duration-500 ease-in-out object-cover"])}"${ssrRenderAttr("src", __props.project.logo_url)} aria-hidden="true" decoding="async" height="1000" loading="lazy" width="1088"${_scopeId}></div><div class="order-2 flex flex-col justify-between p-6 sm:ps-12 sm:pe-6 sm:pb-8 sm:pt-6 lg:ps-16 xl:order-1 h-full"${_scopeId}><div${_scopeId}><div class="mt-2 sm:mt-4 mb-4 flex flex-wrap items-center gap-3 text-xs uppercase tracking-widest"${_scopeId}><span class="rounded-md border border-gray-300 px-2.5 py-1 font-medium text-gray-600"${_scopeId}>${ssrInterpolate(__props.project.type_label)}</span><div class="flex items-center gap-2 text-gray-400"${_scopeId}><!--[-->`);
						ssrRenderList(__props.project.role_labels, (role, index) => {
							_push(`<!--[--><span${_scopeId}>${ssrInterpolate(role)}</span>`);
							if (index !== __props.project.role_labels.length - 1) _push(`<span class="opacity-30"${_scopeId}> • </span>`);
							else _push(`<!---->`);
							_push(`<!--]-->`);
						});
						_push(`<!--]--></div>`);
						if (__props.project.is_in_progress) _push(`<span class="rounded-md bg-amber-100 px-2.5 py-1 normal-case tracking-normal text-amber-600 font-medium"${_scopeId}>${ssrInterpolate(__props.translations.projects?.ongoing ?? __props.translations.projects?.in_progress ?? "Ongoing")}</span>`);
						else _push(`<!---->`);
						_push(`</div><h3 class="mb-3 sm:mb-4 text-start text-xl font-semibold leading-snug lg:text-2xl font-display text-gray-900"${_scopeId}>${ssrInterpolate(__props.project.header)}</h3><p class="mb-6 sm:mb-8 line-clamp-3 text-start leading-relaxed text-gray-600"${_scopeId}>${__props.project.description ?? ""}</p></div><div class="mt-auto pt-4 pb-2 flex flex-col items-start gap-3"${_scopeId}>`);
						if (formattedDates.value) _push(`<div class="flex items-center gap-1 text-xs text-gray-400"${_scopeId}>${ssrInterpolate(formattedDates.value)}</div>`);
						else _push(`<!---->`);
						_push(ssrRenderComponent(_sfc_main$2, {
							plain: true,
							"is-package": __props.project.is_package,
							"project-id": __props.project.id,
							"project-title": __props.project.header,
							translations: __props.translations,
							url: __props.project.project_url
						}, null, _parent, _scopeId));
						_push(`</div></div></article>`);
					} else return [createVNode("article", { class: "relative grid max-w-6xl grid-cols-1 gap-4 rounded-b-xl bg-slate-100 px-4 py-0 md:h-120 lg:gap-16 lg:px-0 xl:grid-cols-2" }, [createVNode("div", {
						class: "relative order-1 overflow-hidden rounded-tl-xl rounded-br-xl hover:cursor-pointer rtl:rounded-bl-xl rtl:rounded-br-none rtl:rounded-tl-none rtl:rounded-tr-xl xl:order-2 h-full",
						onMouseenter: ($event) => zoom.value = true,
						onMouseleave: ($event) => zoom.value = false
					}, [createVNode("img", {
						alt: __props.project.header,
						class: [{ "scale-110": zoom.value }, "h-full w-full transition-transform duration-500 ease-in-out object-cover"],
						src: __props.project.logo_url,
						"aria-hidden": "true",
						decoding: "async",
						height: "1000",
						loading: "lazy",
						width: "1088"
					}, null, 10, ["alt", "src"])], 40, ["onMouseenter", "onMouseleave"]), createVNode("div", { class: "order-2 flex flex-col justify-between p-6 sm:ps-12 sm:pe-6 sm:pb-8 sm:pt-6 lg:ps-16 xl:order-1 h-full" }, [createVNode("div", null, [
						createVNode("div", { class: "mt-2 sm:mt-4 mb-4 flex flex-wrap items-center gap-3 text-xs uppercase tracking-widest" }, [
							createVNode("span", {
								class: "rounded-md border border-gray-300 px-2.5 py-1 font-medium text-gray-600",
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
								class: "rounded-md bg-amber-100 px-2.5 py-1 normal-case tracking-normal text-amber-600 font-medium"
							}, toDisplayString(__props.translations.projects?.ongoing ?? __props.translations.projects?.in_progress ?? "Ongoing"), 1)) : createCommentVNode("", true)
						]),
						createVNode("h3", { class: "mb-3 sm:mb-4 text-start text-xl font-semibold leading-snug lg:text-2xl font-display text-gray-900" }, toDisplayString(__props.project.header), 1),
						createVNode("p", {
							class: "mb-6 sm:mb-8 line-clamp-3 text-start leading-relaxed text-gray-600",
							innerHTML: __props.project.description
						}, null, 8, ["innerHTML"])
					]), createVNode("div", { class: "mt-auto pt-4 pb-2 flex flex-col items-start gap-3" }, [formattedDates.value ? (openBlock(), createBlock("div", {
						key: 0,
						class: "flex items-center gap-1 text-xs text-gray-400"
					}, toDisplayString(formattedDates.value), 1)) : createCommentVNode("", true), createVNode(_sfc_main$2, {
						plain: true,
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
					])])])])];
				}),
				_: 1
			}, _parent));
		};
	}
};
var _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Molecules/ProjectCard.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Home/LatestWork.vue
var _sfc_main = {
	__name: "LatestWork",
	__ssrInlineRender: true,
	props: { latestWorkSection: {
		type: Object,
		required: true
	} },
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<div${ssrRenderAttrs(_attrs)}>`);
			_push(ssrRenderComponent(Section_default, { class: "mt-16" }, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(`<div class="container mx-auto space-y-20 text-center lg:text-left"${_scopeId}><div class="flex flex-col items-center"${_scopeId}>`);
						_push(ssrRenderComponent(Subtitle_default, { class: "leading-loose" }, null, _parent, _scopeId));
						_push(`<div class="wrap-break-word px-2 text-center md:px-20 lg:px-48 xl:px-96"${_scopeId}><p class="mt-6 text-lg text-gray-700 lg:text-xl"${_scopeId}>${__props.latestWorkSection.content.description ?? ""}</p></div></div><div class="mt-20 grid justify-center gap-10 px-10 sm:px-16"${_scopeId}><!--[-->`);
						ssrRenderList(__props.latestWorkSection.latest_projects.data, (project) => {
							_push(ssrRenderComponent(_sfc_main$1, {
								key: project.id,
								project,
								translations: __props.latestWorkSection.translations
							}, null, _parent, _scopeId));
						});
						_push(`<!--]--></div></div>`);
					} else return [createVNode("div", { class: "container mx-auto space-y-20 text-center lg:text-left" }, [createVNode("div", { class: "flex flex-col items-center" }, [createVNode(Subtitle_default, {
						class: "leading-loose",
						innerHTML: __props.latestWorkSection.content.title
					}, null, 8, ["innerHTML"]), createVNode("div", { class: "wrap-break-word px-2 text-center md:px-20 lg:px-48 xl:px-96" }, [createVNode("p", {
						class: "mt-6 text-lg text-gray-700 lg:text-xl",
						innerHTML: __props.latestWorkSection.content.description
					}, null, 8, ["innerHTML"])])]), createVNode("div", { class: "mt-20 grid justify-center gap-10 px-10 sm:px-16" }, [(openBlock(true), createBlock(Fragment, null, renderList(__props.latestWorkSection.latest_projects.data, (project) => {
						return openBlock(), createBlock(_sfc_main$1, {
							key: project.id,
							project,
							translations: __props.latestWorkSection.translations
						}, null, 8, ["project", "translations"]);
					}), 128))])])];
				}),
				_: 1
			}, _parent));
			_push(`</div>`);
		};
	}
};
var _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/LatestWork.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
export { _sfc_main as default };

//# sourceMappingURL=LatestWork-DXMLd92S.js.map