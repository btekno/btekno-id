<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Initial Configuration
    |--------------------------------------------------------------------------
    */

    'plugins' => [
        'recaptcha' => [
            'enable'    => true, 
            'key'       => '6Lekpr8ZAAAAAJ3JzPiBooYjB5fCxHXw10ifcCcU', 
            'secret'    => '6Lekpr8ZAAAAAEA0zfoTo654KHbrwSYT0i82n7Na', 
        ],
        'facebook' => [
            'enable'    => true, 
            'key'       => '291071192179930', 
            'secret'    => '47767a8d5b0061f339715cabdb6ac721'
        ], 
        'twitter' => [
            'enable'    => true, 
            'key'       => 'OU8w3sw8Io9VvRU3JqSBiNq2O', 
            'secret'    => '2peca7UOAPKKAA97YywqA2WgcMtEyzQVpaxLCoEfZU3PE28WYD'
        ], 
        'google' => [
            'enable'    => true, 
            'key'       => '221836369774-nru6kmj415ro5jtjl3spfduivqddvhd9.apps.googleusercontent.com', 
            'secret'    => 'U47GboBExfb3GTuIw6V3ezLZ'
        ]
    ], 

    'toast' => [
        'deny'             => "Oops! You can't perform this action",
        'settings-updated' => 'Settings has been updated!',
        'rate-limit'       => 'Oops! You are rate limited.',
    ],

    'reserved_slugs' => [
        'api',
        'popular',
        'admin',
        'staff',
        'explore',
        'help',
        'settings',
        'open',
        'logout',
        'notifications',
    ],

];
