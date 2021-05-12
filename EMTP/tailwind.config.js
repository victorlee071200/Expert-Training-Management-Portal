const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },
    plugins: [
        require("@tailwindcss/ui"),
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};