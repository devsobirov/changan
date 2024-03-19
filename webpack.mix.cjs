const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/style.scss', 'public/css')
    .options({
        processCssUrls: false // This prevents Mix from modifying url() paths in your CSS files
    });

if (mix.inProduction()) {
    mix.version(); // This will add cache-busting hashes to your assets in production
}
