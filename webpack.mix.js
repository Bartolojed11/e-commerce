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

mix.js('resources/js/user/app.js', 'public/js/user')
    .vue()
    .sass('resources/sass/user/app.scss', 'public/css/user')
    .js('resources/js/admin/admin.js', 'public/js/admin')
    .vue()
    .sass('resources/sass/admin/app.scss', 'public/css/admin');
