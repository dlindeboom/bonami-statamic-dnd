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
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
    mode: 'jit',
}
