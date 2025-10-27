let mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')  // Compilar JS
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'), // Si estás usando TailwindCSS
    ])
    .version();  // Habilita la versión para los archivos compilados
