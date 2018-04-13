<?php

namespace Upayment\Invoices;

use Illuminate\Support\ServiceProvider;

class UpaymentServiceProvider extends ServiceProvider
{

    /**
     * @var mixed
     */
    protected $defer = true;

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
        $this->publishAssetsToClient();
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

    protected function publishAssetsToClient()
    {
        $this->publishes([
            __DIR__ . '/views'  => resource_path('views/vendor/upayment'),
            __DIR__ . '/config' => config_path(),
        ]);
    }
}
