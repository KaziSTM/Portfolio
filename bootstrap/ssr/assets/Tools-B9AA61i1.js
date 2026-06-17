import { computed, mergeProps, useSSRContext } from "vue";
import { usePage } from "@inertiajs/vue3";
import { ssrInterpolate, ssrRenderAttr, ssrRenderAttrs, ssrRenderClass, ssrRenderList } from "vue/server-renderer";
//#region resources/js/Components/Organisms/Home/Tools.vue
var _sfc_main = {
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
var _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Organisms/Home/Tools.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
//#endregion
export { _sfc_main as default };

//# sourceMappingURL=Tools-B9AA61i1.js.map