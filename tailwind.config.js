/** @type {DefaultColors} */
const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");

export default {
    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.teal,
                secondary: colors.gray,
                positive: colors.lime,
                negative: colors.red,
                warning: colors.amber,
                info: colors.cyan,
            },
        },
    },
    corePlugins: {
        aspectRatio: false,
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.ts",
        "./resources/**/*.tsx",
        "./resources/**/*.php",
        "./resources/**/*.vue",
        "./resources/**/*.twig",
        "./storage/framework/views/*.php",
        "./node_modules/flowbite/**/*.js",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
    ],
    safelist: [
        "max-w-xs",
        "max-w-sm",
        "max-w-md",
        "max-w-lg",
        "max-w-xl",
        "max-w-2xl",
        "max-w-3xl",
        "max-w-4xl",
        "max-w-5xl",
        "max-w-6xl",
        "max-w-7xl",
        "sm:max-w-md",
        "md:max-w-xl",
        "lg:max-w-3xl",
        "xl:max-w-5xl",
        "2xl:max-w-7xl",
    ],
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
        require("flowbite/plugin"),
        require("tailwind-clip-path"),
        require("tailwind-scrollbar"),
    ],
};
