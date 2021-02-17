<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Chrome\ChromeOptions;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Dusk Driver Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the dusk drivers below you wish
    | to use as your default driver for all dusk testing.
    |
    */

    'driver' => env('DUSK_DRIVER', 'default'),

    /*
    |--------------------------------------------------------------------------
    | Default Dusk Browser Slug
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the dusk drivers below you wish
    | to use as your default driver for all dusk testing.
    |
    */
    'browser' => env('DUSK_BROWSER', 'chrome'),

    /*
    |--------------------------------------------------------------------------
    | Dusk Drivers
    |--------------------------------------------------------------------------
    |
    | Here are each of the dusk drivers setup for your application.
    |
    */

    'drivers' => [
        'default' => [
            'target' => 'http://localhost:9515',
            'options' => ['--headless', '--disable-gpu'],
        ],
        'docker' => [
            'target' => 'http://selenium:4444/wd/hub'
        ],
    ],

    'browsers' => [
        'chrome' => [
            'option_package' => ChromeOptions::class,
        ]
    ],

];
