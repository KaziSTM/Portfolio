import { t as resolvePageComponent } from "./assets/vendor-D9XPBWcO.js";
import { createApp, h } from "vue";
import { createInertiaApp, router } from "@inertiajs/vue3";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "vue/server-renderer";
//#region resources/js/app.js
var appName = "Portfolio";
router.on("navigate", (event) => {
	const locale = event.detail.page.props.locale;
	document.documentElement.lang = locale;
	document.documentElement.dir = locale === "ar" ? "rtl" : "ltr";
});
var render = await createInertiaApp({
	title: (title) => `${title} - ${appName}`,
	resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, /* #__PURE__ */ Object.assign({
		"./Pages/AboutView.vue": () => import("./assets/AboutView-D5HaClIE.js"),
		"./Pages/ContactView.vue": () => import("./assets/ContactView-CUCXtIW7.js"),
		"./Pages/HomeView.vue": () => import("./assets/HomeView-BzoxX79o.js"),
		"./Pages/Projects/IndexView.vue": () => import("./assets/IndexView-DarIpihc.js"),
		"./Pages/Projects/ShowView.vue": () => import("./assets/ShowView-DTv9zogF.js")
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