const fluidPlugin = require('fluid-tailwind');
const { extract, screens } = fluidPlugin;
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: {
        files: [
            './resources/**/*.blade.php',
            './resources/**/*.js',
            './resources/**/*.vue',
        ],
        extract
    },
    theme: {
        screens,
        fontSize:{
            "4xl": '5.25rem',
            "3xl": ['3.9375rem', {
                lineHeight: '1'
            }],
            "2xl": '3rem',
            "1xl": ['1.75rem', {
                lineHeight: '1'
            }],
            "xl": '1.5rem',
            "lg": '1.25rem',
            "md": '1.125rem',
            "base": '1rem',
            "sm": '0.875rem',
        },
        extend: {
            fontFamily: {
                sans: ["PPObjectSans", ...defaultTheme.fontFamily.sans],
                serif: ["Nympha", ...defaultTheme.fontFamily.serif],
                mono: ["Poppins", ...defaultTheme.fontFamily.mono]
            },
        },
        colors: {
            orange: '#FF5C35',
            'orange-300': '#ff9571',
            'orange-500': '#fe3511',
            consider: '#E3BCA0',
            cream: '#F2E9E3',
            "cream-50": '#f9f5f3',
            "cream-200": '#e3d0c5',
            brown: '#3A1400',
            reinvigorated: '#FEEDDD',
            radiant:'#C37C57',
            energetic:'#805126',
            grey: '#C5C5C5',
            white: '#FFFFFF',
            black: '#000000',
            photo: '#FFE9C6',
            transparent: 'transparent'
        },
    },
    plugins: [fluidPlugin({checkSC144: false}), require('@tailwindcss/container-queries')],
};

