var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    var bpath = 'node_modules/bootstrap-sass/assets';
    var jqueryPath = 'resources/assets/vendor/jquery';
    var bowerPath = 'resources/assets/vendor';
    mix.sass('app.scss')
        .copy(jqueryPath + '/dist/jquery.min.js', 'public/js')
        .copy(bpath + '/fonts', 'public/fonts')
        .copy(bpath + '/javascripts/bootstrap.min.js', 'public/js')
        .copy(bowerPath + '/moment/min/moment.min.js', 'public/js')
        .copy(bowerPath + '/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 'public/js')
        .copy(bowerPath + '/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', 'public/css')
        .copy(bowerPath + '/dropzone/dist/min/dropzone.min.css', 'public/css')
        .copy(bowerPath + '/dropzone/dist/min/dropzone.min.js', 'public/js');
});
