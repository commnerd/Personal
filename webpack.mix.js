let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .js('resources/assets/food/js/app.js', 'public/js/food')
   .sass('resources/assets/food/sass/app.scss', 'public/css/food')
   .js('resources/assets/admin/js/app.js', 'public/js/admin')
   .sass('resources/assets/admin/sass/app.scss', 'public/css/admin')
   .styles([
       'node_modules/bootstrap-sass-datepicker/css/datepicker.css',
       'node_modules/bootstrap-sass-datepicker/css/datepicker3.css'
   ], 'public/css/admin/etc.css');

if (mix.inProduction()) {
    mix.version();
}
