import { computed, mergeProps, ref, useSSRContext } from "vue";
import { usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderList } from "vue/server-renderer";
//#region resources/js/Components/Organisms/Home/Companies.vue
var _sfc_main = {
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
				}, "h-7 w-7 object-contain transition-transform duration-300 ease-in-out sm:h-9 sm:w-9 lg:h-10 lg:w-10"])}"${ssrRenderAttr("src", company.logo_url)} decoding="async" height="50" loading="lazy" width="50"><h2 class="text-center text-xs font-semibold leading-tight text-slate-900 sm:text-sm lg:text-base">${ssrInterpolate(company.name)}</h2></a>`);
			});
			_push(`<!--]--></div></div></section>`);
		};
	}
};
var _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/Companies.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
export { _sfc_main as default };

//# sourceMappingURL=Companies-Bc8qHM3k.js.map