import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            
            colors: {
                'black': '#333',
                'gray' : '#999',
                'white': '#f2f2f2',
                'pink' : '#ff6b7f',
                'clrPrimary' : '#ffc300',
                'clrSecondary' : '#034efd',
            },
        },
    },

    plugins: [forms],
};
