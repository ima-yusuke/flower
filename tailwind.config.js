import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                "top-white":"rgb(248,248,248)",
                "top-button-pink":"rgb(254,135,185)",
                "main-bg":"rgb(237,230,215)",
                "confirm-bg":"rgb(191,158,116)",
                "result-ball":"rgb(191,158,116)"
            }
        },
    },

    plugins: [forms,require('flowbite/plugin')],

};
