<?php

return [

    'controller_namespace' => 'Upayment\Invoices\Http\Controllers',
    'currency'             => 'MYR',
    'route_prefix'         => 'upayment.',
    'billplz'              => [
        'api_key'      => '768098b2-b8f8-4419-a99e-d444b9616599',
        'collection'   => 'mn9w7yqe',
        'callback_url' => env('APP_URL') . '/upayment/completed',
        'redirect_url' => env('APP_URL') . '/upayment/completed',
    ],
];
