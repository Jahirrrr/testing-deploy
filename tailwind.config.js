import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    daisyui: {
        themes: [
            {
                light: {
                    primary: "#48CFCB", // Aqua
                    secondary: "#229799", // Teal
                    accent: "#424242", // Dark Gray
                    neutral: "#F5F5F5", // Light Gray (Background)
                    "base-100": "#F5F5F5", // Light Gray (Base background)
                    info: "#17A2B8", // Soft Blue (Info)
                    success: "#28A745", // Green (Success)
                    warning: "#FFC107", // Amber (Warning)
                    error: "#DC3545", // Red (Error)
                },
            },
        ],
    },
    plugins: [forms, require("daisyui")],
};
