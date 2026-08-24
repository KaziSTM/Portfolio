import { n as _sfc_main$5, t as useGetTitle } from "./useGetTitle-DejgjcG2.js";
import { Fragment, computed, createBlock, createCommentVNode, createVNode, mergeProps, onBeforeUnmount, openBlock, ref, renderList, unref, useSSRContext, watch, withCtx } from "vue";
import { Head, usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderComponent, ssrRenderList, ssrRenderTeleport } from "vue/server-renderer";
//#region resources/js/Components/Organisms/Projects/Testimonials.vue
var _sfc_main$4 = {
	__name: "Testimonials",
	__ssrInlineRender: true,
	props: { testimonials: {
		type: Array,
		required: true
	} },
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "mx-auto max-w-6xl px-4 sm:px-6 pb-12 sm:pb-24" }, _attrs))}><div class="grid gap-6 sm:gap-8 grid-cols-1 md:grid-cols-2"><!--[-->`);
			ssrRenderList(__props.testimonials, (testimonial) => {
				_push(`<article class="rounded-2xl bg-slate-100 p-5 sm:p-8"><p class="mb-6 text-gray-700">${ssrInterpolate(testimonial.content)}</p><div><p class="font-semibold text-gray-900">${ssrInterpolate(testimonial.author)}</p><p class="text-sm text-gray-500">${ssrInterpolate(testimonial.position)}</p></div></article>`);
			});
			_push(`<!--]--></div></section>`);
		};
	}
};
var _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Projects/Testimonials.vue");
	return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Projects/ProjectHero.vue
var _sfc_main$3 = {
	__name: "ProjectHero",
	__ssrInlineRender: true,
	props: { project: {
		type: Object,
		required: true
	} },
	setup(__props) {
		const page = usePage();
		const ongoingLabel = computed(() => {
			return page.props.translations?.projects?.ongoing ?? page.props.translations?.projects?.in_progress ?? "Ongoing";
		});
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "mx-auto max-w-6xl px-4 sm:px-6 pb-10 sm:pb-20 pt-20 sm:pt-28 min-w-0" }, _attrs))}><div class="mb-6 sm:mb-8 flex flex-wrap items-center gap-2 sm:gap-3"><span class="rounded-full bg-slate-200 px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-slate-900">${ssrInterpolate(__props.project.type_label)}</span>`);
			if (!__props.project.end && __props.project.is_in_progress) _push(`<span class="rounded-full bg-amber-100 px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-amber-700">${ssrInterpolate(ongoingLabel.value)}</span>`);
			else _push(`<!---->`);
			_push(`<!--[-->`);
			ssrRenderList(__props.project.role_labels, (role) => {
				_push(`<span class="rounded-full bg-white px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm text-gray-700 ring-1 ring-gray-200 transition hover:bg-gray-50">${ssrInterpolate(role)}</span>`);
			});
			_push(`<!--]--></div>`);
			if (__props.project.tech_tags?.length) {
				_push(`<div class="mb-6 sm:mb-8 flex flex-wrap gap-2 sm:gap-3"><!--[-->`);
				ssrRenderList(__props.project.tech_tags, (tag) => {
					_push(`<span class="rounded-full bg-gray-200 px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm text-gray-700">${ssrInterpolate(tag)}</span>`);
				});
				_push(`<!--]--></div>`);
			} else _push(`<!---->`);
			_push(`<h1 class="max-w-5xl text-xl sm:text-3xl md:text-5xl font-semibold leading-snug tracking-tight text-gray-900 break-words [overflow-wrap:anywhere] min-w-0">${ssrInterpolate(__props.project.header)}</h1></section>`);
		};
	}
};
var _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Projects/ProjectHero.vue");
	return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Organisms/Projects/ProjectContent.vue
var _sfc_main$2 = {
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
			_push(`<section${ssrRenderAttrs(mergeProps({ class: "mx-auto grid max-w-6xl grid-cols-1 gap-10 md:gap-16 px-4 sm:px-6 py-10 sm:py-16 md:py-24 md:grid-cols-3" }, _attrs))}><aside class="grid grid-cols-2 sm:grid-cols-3 md:block gap-6 md:space-y-8 text-sm text-gray-600 min-w-0"><div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.client)}</p><p>${ssrInterpolate(__props.project.company?.name ?? translations.value.personal_project)}</p></div>`);
			if (__props.project.company?.industry) _push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.industry)}</p><p>${ssrInterpolate(__props.project.company.industry)}</p></div>`);
			else _push(`<!---->`);
			if (__props.project.company?.size) _push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.company_size)}</p><p>${ssrInterpolate(__props.project.company.size)}</p></div>`);
			else _push(`<!---->`);
			if (__props.project.company?.headquarter) _push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.headquarters)}</p><p>${ssrInterpolate(__props.project.company.headquarter)}</p></div>`);
			else _push(`<!---->`);
			if (__props.project.start || __props.project.end || !__props.project.end && __props.project.is_in_progress) {
				_push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.duration)}</p><p>`);
				if (__props.project.start) {
					_push(`<!--[-->${ssrInterpolate(__props.project.start)} `);
					if (__props.project.end) _push(`<!--[--> — ${ssrInterpolate(__props.project.end)}<!--]-->`);
					else if (!__props.project.end && __props.project.is_in_progress) _push(`<!--[--> — ${ssrInterpolate(translations.value.ongoing ?? translations.value.in_progress)}<!--]-->`);
					else _push(`<!---->`);
					_push(`<!--]-->`);
				} else if (!__props.project.end && __props.project.is_in_progress) _push(`<!--[-->${ssrInterpolate(translations.value.ongoing ?? translations.value.in_progress)}<!--]-->`);
				else _push(`<!---->`);
				_push(`</p></div>`);
			} else _push(`<!---->`);
			if (companyHost.value) _push(`<div><p class="mb-1 font-medium text-gray-900">${ssrInterpolate(translations.value.website)}</p><a${ssrRenderAttr("href", __props.project.company.website)} class="text-gray-700 hover:underline break-all" rel="noopener noreferrer" target="_blank">${ssrInterpolate(companyHost.value)}</a></div>`);
			else _push(`<!---->`);
			if (__props.project.link) _push(`<div class="col-span-full md:col-span-1 pt-2 md:pt-0"><a${ssrRenderAttr("href", __props.project.link)} class="inline-flex items-center rounded-full bg-gray-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-gray-800" rel="noopener noreferrer" target="_blank">${ssrInterpolate(ctaTranslation.value)} <svg class="ms-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 17L17 7M17 7H8M17 7V16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg></a></div>`);
			else _push(`<!---->`);
			_push(`</aside><div class="space-y-6 sm:space-y-10 text-gray-700 md:col-span-2 min-w-0"><div class="text-lg sm:text-xl font-medium leading-relaxed text-gray-900 break-words [overflow-wrap:anywhere]">${__props.project.description ?? ""}</div><div class="prose prose-base sm:prose-lg max-w-none prose-gray min-w-0 break-words [overflow-wrap:anywhere]">${__props.project.details ?? ""}</div></div></section>`);
		};
	}
};
var _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Projects/ProjectContent.vue");
	return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
//#endregion
//#region resources/js/Components/Molecules/ImageModal.vue
var _sfc_main$1 = {
	__name: "ImageModal",
	__ssrInlineRender: true,
	props: {
		open: {
			type: Boolean,
			default: false
		},
		images: {
			type: Array,
			default: () => []
		},
		currentIndex: {
			type: Number,
			default: 0
		},
		alt: {
			type: String,
			default: ""
		}
	},
	emits: ["close", "change"],
	setup(__props, { emit: __emit }) {
		const props = __props;
		const emit = __emit;
		const activeIndex = ref(props.currentIndex);
		const normalizedImages = computed(() => {
			if (!props.images || props.images.length === 0) return [];
			return props.images.map((img) => {
				if (typeof img === "string") return {
					url: img,
					alt: props.alt
				};
				return {
					url: img.url || img.src || "",
					alt: img.alt || props.alt
				};
			});
		});
		const currentImage = computed(() => {
			if (normalizedImages.value.length === 0) return {
				url: "",
				alt: props.alt
			};
			const idx = Math.max(0, Math.min(activeIndex.value, normalizedImages.value.length - 1));
			return normalizedImages.value[idx];
		});
		const hasMultiple = computed(() => normalizedImages.value.length > 1);
		function close() {
			emit("close");
		}
		function prev() {
			if (!hasMultiple.value) return;
			activeIndex.value = (activeIndex.value - 1 + normalizedImages.value.length) % normalizedImages.value.length;
			emit("change", activeIndex.value);
		}
		function next() {
			if (!hasMultiple.value) return;
			activeIndex.value = (activeIndex.value + 1) % normalizedImages.value.length;
			emit("change", activeIndex.value);
		}
		function handleKeydown(e) {
			if (!props.open) return;
			if (e.key === "Escape") close();
			if (e.key === "ArrowLeft") prev();
			if (e.key === "ArrowRight") next();
		}
		watch(() => props.currentIndex, (val) => {
			activeIndex.value = val;
		});
		watch(() => props.open, (isOpen) => {
			if (typeof window === "undefined") return;
			document.body.classList.toggle("overflow-hidden", isOpen);
			if (isOpen) {
				activeIndex.value = props.currentIndex;
				window.addEventListener("keydown", handleKeydown);
			} else window.removeEventListener("keydown", handleKeydown);
		}, { immediate: true });
		onBeforeUnmount(() => {
			if (typeof window !== "undefined") {
				window.removeEventListener("keydown", handleKeydown);
				document.body.classList.remove("overflow-hidden");
			}
		});
		return (_ctx, _push, _parent, _attrs) => {
			ssrRenderTeleport(_push, (_push) => {
				if (__props.open && currentImage.value.url) {
					_push(`<div class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" aria-modal="true" role="dialog"><div class="absolute inset-0 bg-black/90 backdrop-blur-md transition-opacity"></div><div class="absolute top-4 inset-x-4 sm:inset-x-8 z-20 flex items-center justify-between text-white"><div class="flex items-center gap-3 text-sm font-medium">`);
					if (hasMultiple.value) _push(`<span class="rounded-full bg-white/10 px-3 py-1 text-xs backdrop-blur-sm">${ssrInterpolate(activeIndex.value + 1)} / ${ssrInterpolate(normalizedImages.value.length)}</span>`);
					else _push(`<!---->`);
					if (currentImage.value.alt) _push(`<span class="hidden sm:inline-block max-w-md truncate text-white/80">${ssrInterpolate(currentImage.value.alt)}</span>`);
					else _push(`<!---->`);
					_push(`</div><button type="button" class="rounded-full bg-white/10 p-2.5 text-white/90 hover:bg-white/20 hover:text-white transition-all focus:outline-none focus:ring-2 focus:ring-white/40 cursor-pointer" aria-label="Close preview"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button></div>`);
					if (hasMultiple.value) _push(`<button type="button" class="absolute left-4 z-20 rounded-full bg-white/10 p-3 text-white/90 hover:bg-white/20 hover:text-white transition-all focus:outline-none cursor-pointer" aria-label="Previous image"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>`);
					else _push(`<!---->`);
					_push(`<div class="relative z-10 max-h-[85vh] max-w-[92vw] overflow-hidden flex items-center justify-center pointer-events-auto"><img${ssrRenderAttr("src", currentImage.value.url)}${ssrRenderAttr("alt", currentImage.value.alt)} class="max-h-[85vh] max-w-[92vw] w-auto h-auto object-contain rounded-lg shadow-2xl transition-all duration-300 select-none"></div>`);
					if (hasMultiple.value) _push(`<button type="button" class="absolute right-4 z-20 rounded-full bg-white/10 p-3 text-white/90 hover:bg-white/20 hover:text-white transition-all focus:outline-none cursor-pointer" aria-label="Next image"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>`);
					else _push(`<!---->`);
					_push(`</div>`);
				} else _push(`<!---->`);
			}, "body", false, _parent);
		};
	}
};
var _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Molecules/ImageModal.vue");
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
		const props = __props;
		const title = useGetTitle("project");
		const isModalOpen = ref(false);
		const modalImages = ref([]);
		const modalIndex = ref(0);
		const openHeroPreview = () => {
			const heroSrc = typeof window !== "undefined" && window.innerWidth >= 768 && props.project.data.main_url ? props.project.data.main_url : props.project.data.logo_url || props.project.data.main_url;
			if (!heroSrc) return;
			modalImages.value = [{
				url: heroSrc,
				alt: props.project.data.header
			}];
			modalIndex.value = 0;
			isModalOpen.value = true;
		};
		const openGalleryPreview = (index) => {
			if (!props.project.data.gallery?.length) return;
			modalImages.value = props.project.data.gallery.map((img) => ({
				url: img.url,
				alt: props.project.data.header
			}));
			modalIndex.value = index;
			isModalOpen.value = true;
		};
		const closeModal = () => {
			isModalOpen.value = false;
		};
		return (_ctx, _push, _parent, _attrs) => {
			_push(`<!--[-->`);
			_push(ssrRenderComponent(unref(Head), { title: unref(title) }, null, _parent));
			_push(ssrRenderComponent(_sfc_main$5, null, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) {
						_push(ssrRenderComponent(_sfc_main$3, { project: __props.project.data }, null, _parent, _scopeId));
						if (__props.project.data.main_url || __props.project.data.logo_url) {
							_push(`<section class="w-full"${_scopeId}><picture class="w-full block"${_scopeId}>`);
							if (__props.project.data.main_url) _push(`<source media="(min-width: 768px)"${ssrRenderAttr("srcset", __props.project.data.main_url)}${_scopeId}>`);
							else _push(`<!---->`);
							_push(`<img${ssrRenderAttr("alt", __props.project.data.header)}${ssrRenderAttr("src", __props.project.data.logo_url || __props.project.data.main_url)} class="w-full h-auto max-h-[60vh] md:max-h-[85vh] object-cover cursor-zoom-in hover:opacity-95 transition-opacity"${_scopeId}></picture></section>`);
						} else _push(`<!---->`);
						_push(ssrRenderComponent(_sfc_main$2, { project: __props.project.data }, null, _parent, _scopeId));
						if (__props.project.data.gallery?.length) {
							_push(`<section class="mx-auto grid max-w-7xl gap-4 sm:gap-8 px-4 sm:px-6 pb-12 sm:pb-24 grid-cols-1 md:grid-cols-2"${_scopeId}><!--[-->`);
							ssrRenderList(__props.project.data.gallery, (image, index) => {
								_push(`<img${ssrRenderAttr("alt", __props.project.data.header)}${ssrRenderAttr("src", image.url)} class="w-full rounded-lg object-cover cursor-zoom-in hover:opacity-95 hover:scale-[1.01] transition-all duration-200"${_scopeId}>`);
							});
							_push(`<!--]--></section>`);
						} else _push(`<!---->`);
						if (__props.project.data.testimonials?.length) _push(ssrRenderComponent(_sfc_main$4, { testimonials: __props.project.data.testimonials }, null, _parent, _scopeId));
						else _push(`<!---->`);
						_push(ssrRenderComponent(_sfc_main$1, {
							open: isModalOpen.value,
							images: modalImages.value,
							"current-index": modalIndex.value,
							alt: __props.project.data.header,
							onClose: closeModal,
							onChange: (idx) => modalIndex.value = idx
						}, null, _parent, _scopeId));
					} else return [
						createVNode(_sfc_main$3, { project: __props.project.data }, null, 8, ["project"]),
						__props.project.data.main_url || __props.project.data.logo_url ? (openBlock(), createBlock("section", {
							key: 0,
							class: "w-full"
						}, [createVNode("picture", { class: "w-full block" }, [__props.project.data.main_url ? (openBlock(), createBlock("source", {
							key: 0,
							media: "(min-width: 768px)",
							srcset: __props.project.data.main_url
						}, null, 8, ["srcset"])) : createCommentVNode("", true), createVNode("img", {
							alt: __props.project.data.header,
							src: __props.project.data.logo_url || __props.project.data.main_url,
							class: "w-full h-auto max-h-[60vh] md:max-h-[85vh] object-cover cursor-zoom-in hover:opacity-95 transition-opacity",
							onClick: openHeroPreview
						}, null, 8, ["alt", "src"])])])) : createCommentVNode("", true),
						createVNode(_sfc_main$2, { project: __props.project.data }, null, 8, ["project"]),
						__props.project.data.gallery?.length ? (openBlock(), createBlock("section", {
							key: 1,
							class: "mx-auto grid max-w-7xl gap-4 sm:gap-8 px-4 sm:px-6 pb-12 sm:pb-24 grid-cols-1 md:grid-cols-2"
						}, [(openBlock(true), createBlock(Fragment, null, renderList(__props.project.data.gallery, (image, index) => {
							return openBlock(), createBlock("img", {
								key: image.url,
								alt: __props.project.data.header,
								src: image.url,
								class: "w-full rounded-lg object-cover cursor-zoom-in hover:opacity-95 hover:scale-[1.01] transition-all duration-200",
								onClick: ($event) => openGalleryPreview(index)
							}, null, 8, [
								"alt",
								"src",
								"onClick"
							]);
						}), 128))])) : createCommentVNode("", true),
						__props.project.data.testimonials?.length ? (openBlock(), createBlock(_sfc_main$4, {
							key: 2,
							testimonials: __props.project.data.testimonials
						}, null, 8, ["testimonials"])) : createCommentVNode("", true),
						createVNode(_sfc_main$1, {
							open: isModalOpen.value,
							images: modalImages.value,
							"current-index": modalIndex.value,
							alt: __props.project.data.header,
							onClose: closeModal,
							onChange: (idx) => modalIndex.value = idx
						}, null, 8, [
							"open",
							"images",
							"current-index",
							"alt",
							"onChange"
						])
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

//# sourceMappingURL=ShowView-BMAFxht2.js.map