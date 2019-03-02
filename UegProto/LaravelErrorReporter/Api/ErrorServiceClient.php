<?php
// GENERATED CODE -- DO NOT EDIT!

namespace UegProto\LaravelErrorReporter\Api;

/**
 */
class ErrorServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \UegProto\LaravelErrorReporter\Api\ReportErrorRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ReportError(\UegProto\LaravelErrorReporter\Api\ReportErrorRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/uegProto.laravelErrorReporter.api.ErrorService/ReportError',
        $argument,
        ['\UegProto\LaravelErrorReporter\Api\ReportErrorResponse', 'decode'],
        $metadata, $options);
    }

}
