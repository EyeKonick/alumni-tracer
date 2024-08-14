import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
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
                dangwa: ['Dangwa', 'sans-serif'],
                times: ['Times New Roman', 'serif'],
            },
            screens: {
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
              },
              backgroundImage: {
                'gradient-overlay': 'linear-gradient(to right, rgba(72, 194, 217, 0.75), rgba(230, 218, 141, 0.75))',
                'alumni-bg': "url('/images/bg.jpg')",
                'alumni-logo': "url('/images/alumni-logo.jpg')",
              },
        },
    },

    plugins: [forms],
};
