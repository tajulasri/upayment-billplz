# Billplz payment boilerplate for Laravel

## Installation 

1. Add into composer.json
```php
"repositories": {
    "type": "git",
    "url": "https://github.com/tajulasri/upayment-billplz"
}

2. Install our vcs added package.

```php
    composer install tajulasri/upayment-billplz "0.*"
```

3. Publish vendor assets
```
    php artisan vendor:publish --provider "Upayment\Invoices\UpaymentServiceProvider"
```

Modified views and other config as well.

## Extends controller and services

```php 

    class AnotherPaymentController extends \Upayment\Invoices\Http\Controllers\PaymentController {


    }
```

```php 

    class AnotherPaymentController extends \Upayment\Invoices\Services\PaymentServiceRequest {

        
    }
```


