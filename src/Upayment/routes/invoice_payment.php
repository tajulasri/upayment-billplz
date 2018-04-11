<?php

Route::name('upayment.')
    ->namespace(config('upayment.controller_namespace'))
    ->group(function () {

        Route::name('confirmation')->get('upayment/confirmation')
            ->uses('PaymentController@onPaymentConfirm');

        Route::name('request')->post('upayment/request')
            ->uses('PaymentController@onConnectToBillplz');

        Route::name('completed')->get('upayment/completed')
            ->uses('PaymentController@onPaymentCompleted');
    });
