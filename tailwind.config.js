module.exports = {
    purge: [
        './templates/*.twig',
        './templates/*.css',
    ],
    darkMode: false,
    theme: {
        extend: {
            spacing: {
                '50': '12.5rem',
                '120': '30rem'
            }
        },
        screens: {
            'xs': '360px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        },
        textShadow: {
            'smallblack': '0px 0px 1px black',
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('tailwindcss-textshadow')
    ]
}