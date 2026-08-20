import { n as _plugin_vue_export_helper_default } from "./Subtitle-DtkDPELn.js";
import { mergeProps, useSSRContext } from "vue";
import { ssrRenderAttrs, ssrRenderSlot } from "vue/server-renderer";
//#region resources/js/Components/Atoms/Section.vue
var _sfc_main = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
	_push(`<section${ssrRenderAttrs(mergeProps({ class: "relative py-20 px-4 md:py-28 lg:py-32 lg:px-8" }, _attrs))}>`);
	ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
	_push(`</section>`);
}
var _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Section.vue");
	return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
var Section_default = /*#__PURE__*/ _plugin_vue_export_helper_default(_sfc_main, [["ssrRender", _sfc_ssrRender]]);
//#endregion
export { Section_default as t };

//# sourceMappingURL=Section-CcmBDABV.js.map