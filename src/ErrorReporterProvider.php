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
                config('services.ueg-error-reporter.host')
            );
            $client->secret_key = config('services.ueg-error-reporter.secret_key');
            $client->project_key = config('services.ueg-error-reporter.project_key');
            
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
