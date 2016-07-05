var elixir = require('laravel-elixir');

require('laravel-elixir-stylus');

elixir(function(mix) {
    mix.stylus('main.styl', 'resources/assets/css/main.css');

    mix.styles([
        'bootstrap/css/bootstrap.min.css',
        'bootstrap/css/bootstrap-select.min.css',
        'bootstrap/css/bootstrap-checkbox.min.css',
        'bootstrap/css/bootstrap-datetimepicker.min.css',
        'main.css',
        'media.css'
    ]);

    mix.scripts([
        'jquery/jquery.min.js',
        'moment/moment-with-locales.js',
        'bootstrap/js/bootstrap.min.js',
        'bootstrap/js/bootstrap-select.min.js',
        'bootstrap/js/i18n/defaults-ru_RU.min.js',
        'bootstrap/js/bootstrap-money-field.js',
        'bootstrap/js/bootstrap-datetimepicker.min.js',
        'vuejs/vue.min.js',
        'app.js',
        'vue.js'
    ]);

    mix.browserSync({
        proxy: 'laravel.lead.dev'
    });
});
