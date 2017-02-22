
const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(mix => {

    mix.styles([
        './resources/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css',
        './resources/assets/admin/bower_components/metisMenu/dist/metisMenu.min.css',
        './resources/assets/admin/dist/css/timeline.css',
        './resources/assets/admin/dist/css/sb-admin-2.css'
    ],  'public/css/app.css').webpack('app.css');

    mix.webpack([
        './resources/assets/admin/dist/js/default.js',
        './resources/assets/admin/js/events-create.js',
        './resources/assets/admin/bower_components/metisMenu/dist/metisMenu.min.js',
        './resources/assets/admin/dist/js/sb-admin-2.js',
        './resources/assets/admin/js/bootbox.min.js',
        './resources/assets/admin/js/jscolor.min.js'
    ],  'public/js/app.js');

});
