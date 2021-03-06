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

  .js('resources/js/admin/users.js', 'public/js/admin')
  .js('resources/js/admin/countries.js', 'public/js/admin')
  .js('resources/js/admin/states.js', 'public/js/admin')
  .js('resources/js/admin/roles.js', 'public/js/admin')
  .js('resources/js/admin/cities.js', 'public/js/admin')

  .vue()

  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/style.sass', 'public/css');

mix.browserSync('http://localhost:8000/');
