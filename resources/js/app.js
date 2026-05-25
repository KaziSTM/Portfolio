import '../css/app.css'

import {createApp, h} from 'vue'
import {createInertiaApp, router} from '@inertiajs/vue3'
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers'

import '@fontsource-variable/inter'
import '@fontsource-variable/lexend'
import '@fontsource-variable/cairo'
import '@fontsource/gochi-hand'
import '@fontsource/mr-dafoe'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel'

router.on('navigate', (event) => {
    const locale = event.detail.page.props.locale

    document.documentElement.lang = locale

    document.documentElement.dir =
        locale === 'ar'
            ? 'rtl'
            : 'ltr'
})

createInertiaApp({
    title: (title) => `${title} - ${appName}`,

    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),

    setup({el, App, props, plugin}) {
        return createApp({
            render: () => h(App, props),
        })
            .use(plugin)
            .mount(el)
    },
})
