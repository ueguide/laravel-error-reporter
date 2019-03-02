<?php

namespace Ueg\ErrorReporter\Tests;

use Ueg\ErrorReporter\Tests\TestCase;
use Ueg\ErrorReporter\ErrorReporterClient;
use UegProto\LaravelErrorReporter\Api\ReportErrorResponse;

class StubSimpleRequest
{
    public function wait()
    {
        $response = new ReportErrorResponse();
        $response->setStatus('Ok');

        return [$response, new \stdClass()];
    }
}

/*
{#686
  +"metadata": []
  +"code": 14
  +"details": "Connect Failed"
}*/

class StubClient
{
    public function ReportError(\UegProto\LaravelErrorReporter\Api\ReportErrorRequest $argument,
    $metadata = [], $options = []) 
    {
        $this->argument = $argument;

        return new StubSimpleRequest();
    }
}

class ErrorReporterTest extends TestCase
{
    public function testCanResolveFromTheContainer()
    {
        $manager = $this->app->make('ueg-error-reporter');
        $this->assertInstanceOf(ErrorReporterClient::class, $manager);
    }

    public function testItSetsCredentials()
    {
        $manager = $this->app->make('ueg-error-reporter');
        $this->assertEquals('test-project', $manager->project_key);
        $this->assertEquals('test-secret-key', $manager->secret_key);
    }

    public function testItSetsCustomData()
    {
        $manager = $this->app->make('ueg-error-reporter');
        $manager->tag('host', 'http://ueguide.io');
        $manager->tag('uri', '/foobar');
        $this->assertEquals(
            [
                'host' => 'http://ueguide.io',
                'uri'  => '/foobar'
            ],
            $manager->custom_data
        );
    }

    public function testItReportsError()
    {
        $manager = $this->app->make('ueg-error-reporter');
        // mock client
        $client = new StubClient();
        $manager->client = $client;

        $manager->tag('host', 'http://ueguide.io');
        $manager->tag('uri', '/foobar');

        try {
            if ($foo == 'bar') echo "foobar";
            $this->assertTrue(false);
        } catch (\Exception $e) {
            $result = $manager->report($e);
            $this->assertTrue($result);
        }
    }
}
