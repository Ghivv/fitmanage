import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "fitmanage-yellow": {
                    DEFAULT: "#E6FF28", // Kuning neon dari gambar
                },
                "fitmanage-darkblue": {
                    DEFAULT: "#084B59", // Biru tua dari gambar
                },
                "fitmanage-offwhite": {
                    DEFAULT: "#F9F7F2", // Putih tulang dari gambar
                },
                "fitmanage-gray": {
                    DEFAULT: "#898A8D", // Abu-abu dari gambar
                },
            },
        },
    },

    plugins: [forms],
};
