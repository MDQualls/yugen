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
   .sass('resources/sass/app.scss', 'public/css');

mix.copy('E:\\laravel\\yugen\\yugen\\node_modules\\@ckeditor\\ckeditor5-build-classic\\build\\ckeditor.js', 'public/js/ckeditor.js');
mix.copy('E:\\laravel\\yugen\\yugen\\node_modules\\flatpickr\\dist\\flatpickr.min.js', 'public/js/flatpickr.min.js');
mix.copy('E:\\laravel\\yugen\\yugen\\node_modules\\flatpickr\\dist\\flatpickr.min.css', 'public/css/flatpickr.min.css');