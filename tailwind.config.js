import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["PPObjectSans", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            orange: '#FF5C35',
            consider: '#E3BCA0',
            cream: '#F2E9E3',
            brown: '#3A1400',
            reinvigorated: '#FEEDDD',
            radiant:'#C37C57',
            energetic:'#805126',
            grey: '#C5C5C5',
            white: '#FFFFFF',
            black: '#000000',
            transparent: 'transparent'
        }
    },
    plugins: [],
};
