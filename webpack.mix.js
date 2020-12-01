const mix = require('laravel-mix');

mix.js('resources/js/app/app.js', 'public/js/app.js')
    .sass('resources/sass/app/app.sass', 'public/css/app.css')
    .js('resources/js/admin/app.js', 'public/js/admin.js')
    .sass('resources/sass/admin/app.scss', 'public/css/admin.css')
    .extract(['jquery', 'bootstrap'])
    .options({
        processCssUrls: false
    });
