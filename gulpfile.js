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

//elixir(function(mix) {
//    mix.sass('app.scss');
//});

elixir.config.assetsPath = 'public/assets';

elixir(function(mix) {
    mix.styles([
        'fonts/linecons/css/linecons.css',
        'fonts/fontawesome/css/font-awesome.min.css',
        'bootstrap.css',
        'xenon-core.css',
        'xenon-forms.css',
        'xenon-components.css',
        'xenon-skins.css',
        'custom.css',
        'fonts/elusive/css/elusive.css',
    ]);
});
