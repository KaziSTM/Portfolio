/** @type {DefaultColors} */
import forms from "@tailwindcss/forms";
const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");

export default {
    darkMode: "class",

    theme: {
        extend: {
            colors: {
                primary: colors.teal,
                secondary: colors.gray,
                positive: colors.lime,
                negative: colors.red,
                warning: colors.amber,
                info: colors.cyan,
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            rotate: {
                10: "10deg",
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
    presets: [require("./vendor/tallstackui/tallstackui/tailwind.config.js")],
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
        "./vendor/tallstackui/tallstackui/src/**/*.php",
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
        forms,
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
        require("flowbite/plugin"),
        require("tailwind-clip-path"),
        require("tailwind-scrollbar"),
    ],
};
