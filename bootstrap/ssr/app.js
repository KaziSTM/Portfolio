import { createApp, h } from "vue";
import { createInertiaApp, router } from "@inertiajs/vue3";
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
//#region resources/js/app.js
var appName = "Portfolio";
router.on("navigate", (event) => {
	const locale = event.detail.page.props.locale;
	document.documentElement.lang = locale;
	document.documentElement.dir = locale === "ar" ? "rtl" : "ltr";
});
var render = await createInertiaApp({
	title: (title) => `${title} - ${appName}`,
	resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, /* @__PURE__ */ Object.assign({
		"./Pages/AboutView.vue": () => import("./assets/AboutView-DPArw0Cv.js"),
		"./Pages/ContactView.vue": () => import("./assets/ContactView-Dk004VRk.js"),
		"./Pages/HomeView.vue": () => import("./assets/HomeView-CCG_QWuY.js"),
		"./Pages/Projects/IndexView.vue": () => import("./assets/IndexView-uJWKlVBk.js"),
		"./Pages/Projects/ShowView.vue": () => import("./assets/ShowView-BDC3FDAw.js")
	})),
	setup({ el, App, props, plugin }) {
		return createApp({ render: () => h(App, props) }).use(plugin).mount(el);
	}
});
var renderPage = (page) => render(page, renderToString);
createServer(renderPage);
//#endregion
export { renderPage as default };

//# sourceMappingURL=app.js.map