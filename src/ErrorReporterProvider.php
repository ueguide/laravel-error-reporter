<?php

namespace Ueg\ErrorReporter;

use Illuminate\Support\ServiceProvider;

class ErrorReporterProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ueg-error-reporter', function ($app) {
            $client = new ErrorReporterClient(
                config('services.ueg-error-reporter')
            );
            
            return $client;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ueg-error-reporter'];
    }
}
