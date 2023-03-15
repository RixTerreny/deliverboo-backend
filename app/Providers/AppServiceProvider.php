<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => '8z7hwp4rn3ksxvnc',
                'publicKey' => '4ymytw82d6pw6tbp',
                'privateKey' => 'af7bea8537515027f2ca41d37098304e'
            ]);
        });
    }
}
