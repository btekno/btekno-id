const mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/bootstrap.js', 'public/js')
    .js('resources/assets/js/emoji-picker.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/dark-mode.scss', 'public/css')
    .sass('resources/assets/sass/auto-mode.scss', 'public/css');

if (mix.inProduction()) {
    mix.version().sourceMaps();
}
