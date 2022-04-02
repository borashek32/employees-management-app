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

    .scripts([
        'resources/js/admin/users/fetch.js',
        'resources/js/admin/users/create.js',
        'resources/js/admin/users/show.js'
    ],'public/js/index.js', 'public/js')

    .vue()

    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/style.sass', 'public/css');
