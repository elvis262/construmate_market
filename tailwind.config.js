import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */

const colors = {
    'primary': "#ffd000",
    'secondary': "#edca2a",
   'tertiary': "#947902",
    'secondary2':" #faf8f7",
    'primaryWhite': '#fffefeed'
};


export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: colors
        },
    },

    plugins: [forms],
};
