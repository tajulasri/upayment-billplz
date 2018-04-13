# Billplz payment boilerplate for Laravel

[![codecov](https://codecov.io/gh/tajulasri/upayment-billplz/branch/master/graph/badge.svg)](https://codecov.io/gh/tajulasri/upayment-billplz)

## Installation 

### 1. Add into composer.json
```php
"repositories": {
    "type": "git",
    "url": "https://github.com/tajulasri/upayment-billplz"
}
```

### 2. Install our vcs added package.

```php
php composer install tajulasri/upayment-billplz "0.*"
```

### 3. Publish vendor assets
```
php artisan vendor:publish --provider "Upayment\Invoices\UpaymentServiceProvider"
```

### Modified views and other config as well.

## Extends controller and services

```php 

use \Upayment\Invoices\Http\Controllers\PaymentController;

class AnotherPaymentController extends PaymentController {


}
```

```php 

use \Upayment\Invoices\Services\PaymentServiceRequest;

class AnotherServices extends PaymentServiceRequest {
   
}
```


