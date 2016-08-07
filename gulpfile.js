var elixir = require('laravel-elixir');

require('laravel-elixir-vue');

elixir(function(mix) {
    mix.sass('app.scss')
       .webpack('app.js')
       .version([
       		'css/app.css',
       		'js/app.js'
       ]);
});
