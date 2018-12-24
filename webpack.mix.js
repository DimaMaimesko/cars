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
// mix.scripts([
//     'node_modules/bootstrap/js/src/tooltip.js',
//     'node_modules/bootstrap/js/src/popover.js',
// ], 'public/js/popover.js').version();
mix.js([
    'resources/js/app.js',
    // 'node_modules/bootstrap/js/src/tooltip.js',
    // 'node_modules/bootstrap/js/src/popover.js',

], 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/css/carousel.css',
],  'public/css/carousel.css');
