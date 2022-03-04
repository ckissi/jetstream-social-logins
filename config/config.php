<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    'show_login' => [
        'email_pass' => env('SHOW_EMAIL_PASS', true),
        'google' => env('SHOW_GOOGLE_LOGIN', false),
        'twitter' => env('SHOW_TWITTER_LOGIN', false),
        'facebook' => env('SHOW_FACEBOOK_LOGIN', false),
    ],

    'comming_soon' => env('COMMING_SOON', false),
];