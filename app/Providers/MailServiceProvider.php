<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\MailService;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MailService::class, function ($app) {
            return new MailService();
        });
    }
}