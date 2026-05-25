import { createSSRApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "vue/server-renderer";
//#region node_modules/laravel-vite-plugin/inertia-helpers/index.js
async function resolvePageComponent(path, pages) {
	for (const p of Array.isArray(path) ? path : [path]) {
		const page = pages[p];
		if (typeof page === "undefined") continue;
		return typeof page === "function" ? page() : page;
	}
	throw new Error(`Page not found: ${path}`);
}
//#endregion
//#region resources/js/ssr.js
var appName = "Portfolio";
var renderPage = (page) => createInertiaApp({
	page,
	render: renderToString,
	title: (title) => `${title} - ${appName}`,
	resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, /* @__PURE__ */ Object.assign({ "./Pages/HomeView.vue": () => import("./assets/HomeView-CdrgVmxw.js") })),
	setup({ App, props, plugin }) {
		return createSSRApp({ render: () => h(App, props) }).use(plugin);
	}
});
createServer(renderPage);
//#endregion
export { renderPage as default };

//# sourceMappingURL=ssr.js.map