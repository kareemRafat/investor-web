<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Payment Driver
    |--------------------------------------------------------------------------
    |
    | This value determines which of the following gateways to use.
    |
    | Supported: "mock", "paypal", "stripe"
    |
    */

    'default' => env('PAYMENT_DRIVER', 'mock'),

    /*
    |--------------------------------------------------------------------------
    | PayPal Settings
    |--------------------------------------------------------------------------
    |
    */

    'paypal' => [
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET'),
        'mode' => env('PAYPAL_MODE', 'sandbox'), // sandbox or live
    ],

    /*
    |--------------------------------------------------------------------------
    | Stripe Settings
    |--------------------------------------------------------------------------
    |
    */

    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
