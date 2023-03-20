const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Lato', 'Helvetica', 'Arial', 'sans-serif'],
                display: ['Baumans'],
            },

            colors: {
                'yellow': '#FFD60A',
                'green': '#c2e812',
                'red': '#ff331f',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
