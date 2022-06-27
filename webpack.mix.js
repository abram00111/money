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
.js('resources/js/abr-table.js', 'public/js')
.js('resources/js/changeSelect.js', 'public/js')
.js('resources/js/money.js', 'public/js')
.css('resources/css/abr-table.css', 'public/css')
.css('resources/css/style.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
