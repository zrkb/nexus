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
    // Config
    .setPublicPath(path.resolve('./'))

    // Fonts
    .copy('node_modules/boxicons/fonts', 'resources/assets/fonts/vendor/boxicons')
    .copy('resources/assets/fonts', 'public/assets/fonts')

    // Copy
    .copy('resources/assets/css', 'public/assets/css')
    .copy('resources/assets/libs', 'public/assets/libs')
    .copy('resources/assets/img', 'public/assets/img')

    // App
    .js('resources/assets/js/app.js', 'public/assets/js')
    .sass('resources/assets/scss/app.scss', 'public/assets/css')
    .sass('resources/assets/scss/mango.scss', 'public/assets/css')
    .sass('resources/assets/scss/berry.scss', 'public/assets/css')

    .setPublicPath('public') // Reset the public path before versioning
    .version()
;
