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

mix.js('resources/js/utility.js', 'public/assets/pages')
    .js('resources/js/pages/login.js', 'public/assets/pages')
    .js('resources/js/pages/openAccount.js','public/assets/pages')
    .js('resources/js/pages/sendMoney.js','public/assets/pages')
    .js('resources/js/pages/request.js', 'public/assets/pages')
     .js('resources/js/pages/changePassword.js', 'public/assets/pages')
     .js('resources/js/pages/confirmToken.js', 'public/assets/pages')

    .version();

    
