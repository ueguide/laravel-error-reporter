<?php

namespace Ueg\ErrorReporter\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Ueg\ErrorReporter\ErrorReporterProvider;

class TestCase extends BaseTestCase
{

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set(
            'services.ueg-error-reporter.host',
            'test.host'
        );
        $app['config']->set(
            'services.ueg-error-reporter.port',
            '443'
        );
        $app['config']->set(
            'services.ueg-error-reporter.project_key',
            'test-project'
        );
        $app['config']->set(
            'services.ueg-error-reporter.secret_key',
            'test-secret-key'
        );
        //$app['config']->set(
        //    'services.ueg-error-reporter.ca_path',
        //    '/path/to/ca/file.pem'
        //);
    }

    /**
     * Get package service providers.
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ErrorReporterProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ErrorReporter' => 'Ueg\ErrorReporter\Facades\ErrorReporter'
        ];
    }

}
