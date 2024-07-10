<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Server Connection
    |--------------------------------------------------------------------------
    |
    | The default Vite server connection address to be used if no URL is
    | specified while the server is running. Use this value if you need
    | to specify a URL that differs from the default Vite dev server.
    |
    */

    'dev_server' => [
        'url' => env('VITE_DEV_SERVER_URL', 'http://localhost:3000'),
        'enabled' => env('VITE_DEV_SERVER_ENABLED', false),
        'key' => env('VITE_DEV_SERVER_KEY'),
        'cert' => env('VITE_DEV_SERVER_CERT'),
        'secure' => env('VITE_DEV_SERVER_SECURE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Build Path
    |--------------------------------------------------------------------------
    |
    | The path that Vite's manifest and assets should be published to. This
    | should be set to the build directory where Vite will place the files
    | upon compilation.
    |
    */

    'build_path' => env('VITE_BUILD_PATH', 'build'),

    /*
    |--------------------------------------------------------------------------
    | Hot Module Replacement Path
    |--------------------------------------------------------------------------
    |
    | If you are using Hot Module Replacement, you may need to specify the
    | URL path that should be used to connect to the HMR server.
    |
    */

    'hot_module_replacement_path' => env('VITE_HMR_PATH', '/@vite'),

];
