import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
/**
 *   --primary: #ffd60e;
  --secondary: #bf7008;
  --tertiary: #bf7008;
  --secondary2: #f0f3f2
 */
const colors = {
    'primary': "#ffd60e",
    'secondary': "#edca2a",
   'tertiary': "#bf7008",
    'secondary2':"#f0f3f2",
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
                sans: ['Montserrat', 'sans-serif'],
            },
            colors: colors
        },
    },

    plugins: [forms],
};
