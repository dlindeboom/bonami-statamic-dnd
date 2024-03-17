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
                colors: {
                    "cool-gray": {
                        50: '#f4f4f4',
                        100: '#e5e5e5',
                        200: '#c6c6c6',
                        300: '#a8a8a8',
                        400: '#8a8a8a',
                        500: '#757575',
                        600: '#4d4d4d',
                        700: '#3d3d3d',
                        800: '#303030',
                        900: '#2b2b2b',
                    }
                },
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
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
    mode: 'jit',
}
