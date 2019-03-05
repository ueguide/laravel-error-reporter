<?php

namespace Ueg\ErrorReporter;

use Ueg\Api\Error\ErrorServiceClient;
use Ueg\Api\Error\ReportErrorRequest;
use Ueg\Api\Error\Credentials;
use Ueg\Api\Error\StackReport;
use Google\Protobuf\Struct;
use Google\Protobuf\Value;

class ErrorReporterClient
{
    public $client;
    public $secret_key;
    public $project_key;
    public $custom_data = [];

    public function __construct($config)
    {
        $this->secret_key = $config['secret_key'];
        $this->project_key = $config['project_key'];

        $host = $config['host'];
        $port = $config['port'];

        if (!empty($config['ca_path'])) {
            // set credentials root
            \Grpc\ChannelCredentials::setDefaultRootsPem(
                file_get_contents($config['ca_path'])
            );
            $this->client = new ErrorServiceClient(
                $host . ':' . $port, 
                [
                    'grpc.ssl_target_name_override' => $host,
                    'grpc.default_authority' => $host,
                    'credentials' => \Grpc\ChannelCredentials::createSsl(
                        file_get_contents($config['ca_path'])
                    ),
                ]
            );
        } else {
            $this->client = new ErrorServiceClient(
                $host . ':' . $port, 
                [
                    'credentials' => \Grpc\ChannelCredentials::createInsecure(),
                ]
            );
        }

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
            //dd($status);
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
