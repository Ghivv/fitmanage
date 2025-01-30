const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/member.js", "public/js") // Tambahkan baris ini
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);
