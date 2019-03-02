<?php

namespace Ueg\ErrorReporter;

use UegProto\LaravelErrorReporter\Api\ErrorServiceClient;
use UegProto\LaravelErrorReporter\Api\ReportErrorRequest;
use UegProto\LaravelErrorReporter\Api\Credentials;
use UegProto\LaravelErrorReporter\Api\StackReport;
use Google\Protobuf\Struct;
use Google\Protobuf\Value;

class ErrorReporterClient
{
    public $client;
    public $secret_key;
    public $project_key;
    public $custom_data = [];

    public function __construct($host)
    {
        $this->client = new ErrorServiceClient(
			$host, 
			[
            	'credentials' => \Grpc\ChannelCredentials::createInsecure(),
			]
		);
    }

    public function tag($key, $val)
    {
        $this->custom_data[$key] = $val;
    }

    public function report(\Exception $e)
    {
        try {
            $request = $this->buildNewRequest($e);

            list($reply, $status) = $this->client->ReportError($request)->wait();
            
            if ($reply) {
                if ($reply->getStatus() === 'Ok') {
                    return true;
                } else {
                    return $reply->getError();
                }
            }

            return $status;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function buildNewRequest(\Exception $e)
    {
        $request = new ReportErrorRequest();
        // set credentials
        $credentials = new Credentials();
        $credentials->setProjectKey($this->project_key);
        $credentials->setSecretKey($this->secret_key);
        $request->setCredentials($credentials);
        // set error group name 
        $request->setErrorGroupName($e->getMessage().':'.$e->getLine());
        // set stack report 
        $stackReport = new StackReport();
        $stackReport->setErrorMessage($e->getMessage());
        $stackReport->setFilename($e->getFile());
        $stackReport->setLineNumber($e->getLine());
        $stackReport->setStackTrace($e->getMessage() . "\n" . $e->getTraceAsString());
        $request->setStackReport($stackReport);
        // set custom data
        if (!empty($this->custom_data)) {
            $struct = new Struct();
            $map = [];
            foreach($this->custom_data as $key => $val) {
                $value = new Value();
                $value->setStringValue($val);
                $map[$key] = $value;
            }
            $struct->setFields($map);
            $request->setCustomData($struct);
        }

        return $request;
    }
}
