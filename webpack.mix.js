const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/frontend/app.scss', 'public/css/frontend')
    .copy('resources/images', 'public/images');


mix.sass('resources/scss/backend/app.scss', 'public/css/backend');

mix.sass('resources/scss/backend/organisation/index.scss', 'public/css/organisation/organisation.css');
