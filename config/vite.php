<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Entrypoints
    |--------------------------------------------------------------------------
    |
    | These are the files that should be considered entry points for the
    | application. Typically, these are your main CSS and JavaScript files.
    |
    */

    'entrypoints' => [
        'resources/css/app.css',
        'resources/js/app.js',
    ],

    /*
    |--------------------------------------------------------------------------
    | Build Path
    |--------------------------------------------------------------------------
    |
    | This is the directory where your built assets will be stored.
    | It should match the "outDir" value in your vite.config.js file.
    |
    */

    'build_path' => public_path('build'),

];
