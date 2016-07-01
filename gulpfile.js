var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.styles([
        'bootstrap/css/bootstrap.min.css',
        'bootstrap/css/bootstrap-checkbox.min.css',
        'main.css'
    ]);

    mix.scripts([
        'jquery/jquery.min.js',
        'bootstrap/js/bootstrap.min.js',
        'app.js'
    ]);

    mix.browserSync();
});
