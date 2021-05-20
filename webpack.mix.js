const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/jquery-3.6.0.min.js', 'public/js')
    .js('resources/js/bootstrap.min.js', 'public/js')
    .vue()
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/bootstrap.min.css', 'public/css')
    .css('resources/css/starter-template.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
