<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
        'client_id' => '2263851810594239',
        'client_secret' => '610d2bb64a09b9cdc2f79ff0f1da453d',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],    

    'twitter' => [
        'client_id' => 'UFxs4HMvLS40EaPqlBBTYGSCO',
        'client_secret' => '6BDLTC8Tg3HpSI2EFJSrM2CEJLd0RnIrN3KcFF4sPIDHMCpJ1v',
        'redirect' => 'https://cjb.colanonline.in/auth/twitter/callback',
    ],    
];
