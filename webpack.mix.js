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
/*
mix.js([
    'public/dist/js/adminlte.js',
    'public/dist/js/pages/dashboard.js',
    'public/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'public/plugins/jquery-ui/jquery-ui.min.js',
    'public/plugins/jquery/jquery.min.js'
],'public/build.js');
*/
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
