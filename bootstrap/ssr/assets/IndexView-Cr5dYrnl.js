import { n as _sfc_main$3, t as FadeContent_default } from "./FadeContent-BIRVTgEr.js";
import { n as _sfc_main$4, t as useGetTitle } from "./useGetTitle--vwnvYF8.js";
import { Fragment, computed, createBlock, createCommentVNode, createTextVNode, createVNode, mergeProps, openBlock, renderList, toDisplayString, unref, useSSRContext, withCtx } from "vue";
import { Head, Link, router, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderComponent, ssrRenderList } from "vue/server-renderer";
//#region resources/js/Components/Atoms/Pagination.vue
var _sfc_main$2 = {
	__name: "Pagination",
	__ssrInlineRender: true,
	props: { links: {
		type: Array,
		required: true
	} },
	setup(__props) {
		const props = __props;
		const page = usePage();
		const actionsTranslation = computed(() => page.props.translations.actions);
		const previous = computed(() => props.links[0]);
		const next = computed(() => props.links[props.links.length - 1]);
		const pages = computed(() => props.links.slice(1, -1));
		return (_ctx, _push, _parent, _attrs) => {
			if (__props.links.length > 3) {
				_push(`<nav${ssrRenderAttrs(mergeProps({
					"aria-label": "Pagination Navigation",
					class: "flex items-center justify-center space-x-2"
				}, _attrs))}>`);
				if (!previous.value.url) _push(`<span class="cursor-not-allowed rounded-full border border-slate-300 bg-slate-100 px-6 py-3 text-sm font-medium text-gray-700">${ssrInterpolate(actionsTranslation.value.prev)}</span>`);
				else _push(ssrRenderComponent(unref(Link), {
					href: previous.value.url,
					class: "rounded-full border border-slate-100 bg-slate-50 px-6 py-3 text-sm font-medium text-slate-500 transition-colors hover:bg-slate-100",
					"preserve-scroll": ""
				}, {
					default: withCtx((_, _push, _parent, _scopeId) => {
						if (_push) _push(`${ssrInterpolate(actionsTranslation.value.prev)}`);
						else return [createTextVNode(toDisplayString(actionsTranslation.value.prev), 1)];
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
				if (!next.value.url) _push(`<span class="cursor-not-allowed rounded-full border border-slate-300 bg-slate-100 px-6 py-3 text-sm font-medium text-gray-700">${ssrInterpolate(actionsTranslation.value.next)}</span>`);
				else _push(ssrRenderComponent(unref(Link), {
					href: next.value.url,
					class: "rounded-full border border-slate-100 bg-slate-50 px-6 py-3 text-sm font-medium text-slate-700 transition-colors hover:bg-slate-100",
					"preserve-scroll": ""
				}, {
					default: withCtx((_, _push, _parent, _scopeId) => {
						if (_push) _push(`${ssrInterpolate(actionsTranslation.value.next)}`);
						else return [createTextVNode(toDisplayString(actionsTranslation.value.next), 1)];
					}),
					_: 1
				}, _parent));
				_push(`</nav>`);
			} else _push(`<!---->`);
		};
	}
};
var _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Pagination.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
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
		}
	},
	setup(__props) {
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
					if (_push) {
						_push(`<div class="${ssrRenderClass([{
							"md:mt-24 lg:mt-32 rounded-br-[3rem]": __props.reverse,
							"rounded-tl-[3rem]": !__props.reverse
						}, "bg-slate-100 p-8 md:py-10 md:px-16 h-full rounded-2xl"])}"${_scopeId}><div class="grid gap-10"${_scopeId}>`);
						if (!__props.reverse) _push(`<div class="mb-2"${_scopeId}><img${ssrRenderAttr("alt", __props.project.header)}${ssrRenderAttr("src", __props.project.logo_url)} class="w-full h-auto object-contain"${_scopeId}></div>`);
						else _push(`<!---->`);
						_push(`<div class="space-y-10"${_scopeId}><div class="flex items-center justify-between"${_scopeId}><span class="inline-block rounded border border-gray-400 px-2 py-1 text-[10px] font-medium tracking-widest uppercase text-gray-700"${_scopeId}>${ssrInterpolate(__props.project.type_label)}</span><div class="flex flex-wrap gap-2 text-xs tracking-widest uppercase text-gray-600"${_scopeId}><!--[-->`);
						ssrRenderList(__props.project.role_labels, (role, index) => {
							_push(`<!--[--><span${_scopeId}>${ssrInterpolate(role)}</span>`);
							if (index !== __props.project.role_labels.length - 1) _push(`<span class="opacity-30"${_scopeId}> • </span>`);
							else _push(`<!---->`);
							_push(`<!--]-->`);
						});
						_push(`<!--]--></div></div><span class="text-2xl font-semibold text-gray-900 leading-tight max-w-xs"${_scopeId}>${ssrInterpolate(__props.project.header)}</span></div>`);
						_push(ssrRenderComponent(_sfc_main$3, {
							"is-package": __props.project.is_package,
							"project-id": __props.project.id,
							"project-title": __props.project.header,
							url: __props.project.project_url
						}, null, _parent, _scopeId));
						if (__props.reverse) _push(`<div class="mt-2"${_scopeId}><img${ssrRenderAttr("alt", __props.project.header)}${ssrRenderAttr("src", __props.project.logo_url)} class="w-full h-auto object-contain"${_scopeId}></div>`);
						else _push(`<!---->`);
						_push(`</div></div>`);
					} else return [createVNode("div", { class: [{
						"md:mt-24 lg:mt-32 rounded-br-[3rem]": __props.reverse,
						"rounded-tl-[3rem]": !__props.reverse
					}, "bg-slate-100 p-8 md:py-10 md:px-16 h-full rounded-2xl"] }, [createVNode("div", { class: "grid gap-10" }, [
						!__props.reverse ? (openBlock(), createBlock("div", {
							key: 0,
							class: "mb-2"
						}, [createVNode("img", {
							alt: __props.project.header,
							src: __props.project.logo_url,
							class: "w-full h-auto object-contain"
						}, null, 8, ["alt", "src"])])) : createCommentVNode("", true),
						createVNode("div", { class: "space-y-10" }, [createVNode("div", { class: "flex items-center justify-between" }, [createVNode("span", {
							class: "inline-block rounded border border-gray-400 px-2 py-1 text-[10px] font-medium tracking-widest uppercase text-gray-700",
							textContent: toDisplayString(__props.project.type_label)
						}, null, 8, ["textContent"]), createVNode("div", { class: "flex flex-wrap gap-2 text-xs tracking-widest uppercase text-gray-600" }, [(openBlock(true), createBlock(Fragment, null, renderList(__props.project.role_labels, (role, index) => {
							return openBlock(), createBlock(Fragment, { key: role }, [createVNode("span", null, toDisplayString(role), 1), index !== __props.project.role_labels.length - 1 ? (openBlock(), createBlock("span", {
								key: 0,
								class: "opacity-30"
							}, " • ")) : createCommentVNode("", true)], 64);
						}), 128))])]), createVNode("span", {
							class: "text-2xl font-semibold text-gray-900 leading-tight max-w-xs",
							textContent: toDisplayString(__props.project.header)
						}, null, 8, ["textContent"])]),
						createVNode(_sfc_main$3, {
							"is-package": __props.project.is_package,
							"project-id": __props.project.id,
							"project-title": __props.project.header,
							url: __props.project.project_url
						}, null, 8, [
							"is-package",
							"project-id",
							"project-title",
							"url"
						]),
						__props.reverse ? (openBlock(), createBlock("div", {
							key: 1,
							class: "mt-2"
						}, [createVNode("img", {
							alt: __props.project.header,
							src: __props.project.logo_url,
							class: "w-full h-auto object-contain"
						}, null, 8, ["alt", "src"])])) : createCommentVNode("", true)
					])], 2)];
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
	setup(__props) {
		const page = usePage();
		const projects = computed(() => page.props.projects);
		const roles = computed(() => page.props.roles);
		const selectedRole = computed(() => page.props.selectedRole);
		const translations = computed(() => page.props.translations.projects);
		const title = useGetTitle("work");
		function setRole(role = null) {
			router.get(route("work"), { role }, {
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
						_push(`<section class="relative mx-auto max-w-6xl space-y-8 px-4 pb-24 pt-8 sm:px-6 sm:pb-28 sm:pt-10 md:space-y-16 lg:pb-32"${_scopeId}><div class="mt-10 flex flex-wrap justify-center gap-3"${_scopeId}><button class="${ssrRenderClass([{
							"bg-primary-700 text-white shadow-lg": !selectedRole.value,
							"bg-secondary-100 text-secondary-600 hover:bg-secondary-200": selectedRole.value
						}, "rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"])}"${_scopeId}>${ssrInterpolate(translations.value.all)}</button><!--[-->`);
						ssrRenderList(roles.value, (role) => {
							_push(`<button class="${ssrRenderClass([{
								"bg-primary-700 text-white shadow-lg": selectedRole.value === role.value,
								"bg-secondary-100 text-secondary-600 hover:bg-secondary-200": selectedRole.value !== role.value
							}, "rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"])}"${_scopeId}>${ssrInterpolate(role.label)}</button>`);
						});
						_push(`<!--]--></div><div class="grid grid-cols-1 items-start gap-x-6 gap-y-10 md:grid-cols-2 md:gap-x-10 md:gap-y-16 lg:gap-x-14 lg:gap-y-20"${_scopeId}><!--[-->`);
						ssrRenderList(projects.value.data, (project, index) => {
							_push(`<div class="relative h-full overflow-hidden"${_scopeId}>`);
							_push(ssrRenderComponent(_sfc_main$1, {
								project,
								reverse: index % 2 !== 0
							}, null, _parent, _scopeId));
							_push(`</div>`);
						});
						_push(`<!--]--></div>`);
						_push(ssrRenderComponent(_sfc_main$2, { links: projects.value.links }, null, _parent, _scopeId));
						_push(`</section>`);
					} else return [createVNode("section", { class: "relative mx-auto max-w-6xl space-y-8 px-4 pb-24 pt-8 sm:px-6 sm:pb-28 sm:pt-10 md:space-y-16 lg:pb-32" }, [
						createVNode("div", { class: "mt-10 flex flex-wrap justify-center gap-3" }, [createVNode("button", {
							class: [{
								"bg-primary-700 text-white shadow-lg": !selectedRole.value,
								"bg-secondary-100 text-secondary-600 hover:bg-secondary-200": selectedRole.value
							}, "rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"],
							onClick: ($event) => setRole()
						}, toDisplayString(translations.value.all), 11, ["onClick"]), (openBlock(true), createBlock(Fragment, null, renderList(roles.value, (role) => {
							return openBlock(), createBlock("button", {
								key: role.value,
								class: [{
									"bg-primary-700 text-white shadow-lg": selectedRole.value === role.value,
									"bg-secondary-100 text-secondary-600 hover:bg-secondary-200": selectedRole.value !== role.value
								}, "rounded-full px-5 py-2 text-sm font-medium transition-all duration-200"],
								onClick: ($event) => setRole(role.value)
							}, toDisplayString(role.label), 11, ["onClick"]);
						}), 128))]),
						createVNode("div", { class: "grid grid-cols-1 items-start gap-x-6 gap-y-10 md:grid-cols-2 md:gap-x-10 md:gap-y-16 lg:gap-x-14 lg:gap-y-20" }, [(openBlock(true), createBlock(Fragment, null, renderList(projects.value.data, (project, index) => {
							return openBlock(), createBlock("div", {
								key: project.id,
								class: "relative h-full overflow-hidden"
							}, [createVNode(_sfc_main$1, {
								project,
								reverse: index % 2 !== 0
							}, null, 8, ["project", "reverse"])]);
						}), 128))]),
						createVNode(_sfc_main$2, { links: projects.value.links }, null, 8, ["links"])
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

//# sourceMappingURL=IndexView-Cr5dYrnl.js.map