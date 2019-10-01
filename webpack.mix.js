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

mix
	.js('resources/assets/js/app.js', 'public/assets/js')
	.sass('resources/assets/scss/app.scss', 'public/assets/css')
    .copy('resources/assets/css', 'public/assets/css')
    .copy('resources/assets/fonts', 'public/assets/fonts')
    .copy('resources/assets/libs', 'public/assets/libs')
    .copy('resources/assets/img', 'public/assets/img');
