module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'bonami-blue': '#003366',
                'bonami-red': '#cc0000',
                'bonami-gray': '#f4f4f4',
            },
            fontFamily: {
                sans: ['Open Sans', 'sans-serif'],
            },
            spacing: {
                // Custom spacing can go here based on design requirements
            },
            borderRadius: {
                'custom-radius': '0.5rem',
            },
        },
        // typography: (theme) => ({
        //     DEFAULT: {
        //         css: {
        //             h1: {
        //                 fontSize: '2.25rem',
        //                 lineHeight: '2.5rem',
        //             },
        //             h2: {
        //                 fontSize: '1.5rem',
        //                 lineHeight: '2rem',
        //             },
        //             h3: {
        //                 fontSize: '1.25rem',
        //                 lineHeight: '1.75rem',
        //             },
        //         },
        //     },
        // }),
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
    mode: 'jit',
}
