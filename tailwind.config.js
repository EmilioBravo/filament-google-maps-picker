/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/forms/components/*.blade.php"],
    darkMode: "class",
    theme: {
        extend: {},
    },
    corePlugins: {
        preflight: false,
    },
    plugins: [],
};