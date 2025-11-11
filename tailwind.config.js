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
            colors: {
                'boom-orange': '#E94C23',
                'boom-green': '#E5E863',
                'boom-blue': '#79BFEA',
                'boom-pink': '#FFC2F5',
                'boom-gray': '#3C3C3B',
            },
            fontFamily: {
                sans: ['Geologica', ...defaultTheme.fontFamily.sans],
                script: ['Caveat', 'cursive'],
            },
            animation: {
                'fadeInUp': 'fadeInUp 1s ease-out forwards',
                'float': 'float 6s ease-in-out infinite',
                'floatReverse': 'floatReverse 8s ease-in-out infinite',
                'pulse-slow': 'pulse 3s ease-in-out infinite',
                'gradient-shift': 'gradientShift 15s ease infinite',
            },
            keyframes: {
                fadeInUp: {
                    'from': {
                        opacity: '0',
                        transform: 'translateY(30px)',
                    },
                    'to': {
                        opacity: '1',
                        transform: 'translateY(0)',
                    },
                },
                float: {
                    '0%, 100%': {
                        transform: 'translateY(0px) translateX(0px)',
                    },
                    '50%': {
                        transform: 'translateY(-20px) translateX(10px)',
                    },
                },
                floatReverse: {
                    '0%, 100%': {
                        transform: 'translateY(0px) translateX(0px)',
                    },
                    '50%': {
                        transform: 'translateY(20px) translateX(-10px)',
                    },
                },
                gradientShift: {
                    '0%': {
                        backgroundPosition: '0% 50%',
                    },
                    '50%': {
                        backgroundPosition: '100% 50%',
                    },
                    '100%': {
                        backgroundPosition: '0% 50%',
                    },
                },
            },
        },
    },

    plugins: [forms],
};