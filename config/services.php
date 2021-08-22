<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id'     => '291071192179930',
        'client_secret' => '47767a8d5b0061f339715cabdb6ac721',
        'redirect'      => env('APP_URL', 'https://btekno-id.test') . '/login/facebook/callback',
    ],
    
    'google' => [
        'client_id'     => '221836369774-nru6kmj415ro5jtjl3spfduivqddvhd9.apps.googleusercontent.com',
        'client_secret' => 'U47GboBExfb3GTuIw6V3ezLZ',
        'redirect'      => env('APP_URL', 'https://btekno-id.test') . '/login/google/callback',
    ],
    
    'twitter' => [
        'client_id'     => 'TIVvrhMRm1n6TuEBNtuLpt0tv',
        'client_secret' => 'baH38IApus6cp9OOfv83lWO0WhDxhBz6A57lVTcGeaOEQitTQs',
        'redirect'      => env('APP_URL', 'https://btekno-id.test') . '/login/twitter/callback',
    ],

];
