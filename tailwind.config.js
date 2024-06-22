/** @type {DefaultColors} */
import forms from "@tailwindcss/forms";
const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");

export default {
    darkMode: "class",

    theme: {
        extend: {
            animation: {
                "spin-slow": "spin 5s linear infinite",
            },
            colors: {
                primary: {
                    50: "#f0faff",
                    100: "#e0f3fe",
                    200: "#bae5fd",
                    300: "#7dcffc",
                    400: "#38b4f8",
                    500: "#0e9be9",
                    600: "#0281c7",
                    700: "#0369a1",
                    800: "#075885",
                    900: "#0c4b6e",
                    950: "#083249",
                },
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
        screens: {
            xxs: "370px",
            xs: "475px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
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
