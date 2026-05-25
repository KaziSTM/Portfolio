import { createTextVNode, mergeProps, useSSRContext, withCtx } from "vue";
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderSlot } from "vue/server-renderer";
//#region \0plugin-vue:export-helper
var _plugin_vue_export_helper_default = (sfc, props) => {
	const target = sfc.__vccOpts || sfc;
	for (const [key, val] of props) target[key] = val;
	return target;
};
//#endregion
//#region resources/js/Components/Atoms/Title.vue
var _sfc_main$1 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
	_push(`<h1${ssrRenderAttrs(mergeProps({ class: "text-2xl font-bold text-black md:text-4xl lg:text-5xl xl:text-6xl" }, _attrs))}>`);
	ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
	_push(`</h1>`);
}
var _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
	const ssrContext = useSSRContext();
	(ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Components/Atoms/Title.vue");
	return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
var Title_default = /* @__PURE__ */ _plugin_vue_export_helper_default(_sfc_main$1, [["ssrRender", _sfc_ssrRender]]);
//#endregion
//#region resources/js/Pages/HomeView.vue
var _sfc_main = {
	__name: "HomeView",
	__ssrInlineRender: true,
	setup(__props) {
		return (_ctx, _push, _parent, _attrs) => {
			_push(ssrRenderComponent(Title_default, _attrs, {
				default: withCtx((_, _push, _parent, _scopeId) => {
					if (_push) _push(` some random test `);
					else return [createTextVNode(" some random test ")];
				}),
				_: 1
			}, _parent));
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

//# sourceMappingURL=HomeView-CdrgVmxw.js.map