const mix = require("laravel-mix");

mix.disableNotifications();

mix.setPublicPath("./resources/dist")
    .minify('./resources/js/filament-google-maps-picker-core.js', './resources/dist/filament-google-maps-picker-core.min.js')
    .postCss("./resources/css/filament-google-maps-picker.css", "filament-google-maps-picker.css", [
        require("tailwindcss")("./tailwind.config.js"),
    ])
    .options({
        processCssUrls: false,
    });