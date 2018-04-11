<?php

namespace Upayment\Invoices;

use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadOurViews();
        $this->loadOurRoutes();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadOurConfig();
    }

    protected function loadOurViews()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'upayment');
    }

    protected function loadOurConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/upayment.php', 'upayment'
        );
    }

    protected function loadOurRoutes()
    {
        $this->loadRoutesFrom(
            __DIR__ . '/routes/invoice_payment.php'
        );
    }

    protected function publishViewsClient()
    {
        $this->publishes([
            __DIR__ . '/views/payment_complete'     => resource_path('views/vendor/payment_complete'),
            __DIR__ . '/views/payment_confirmation' => resource_path('views/vendor/payment_confirmation'),
        ]);
    }
}
