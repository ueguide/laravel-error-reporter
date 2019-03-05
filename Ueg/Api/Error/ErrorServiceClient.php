<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Ueg\Api\Error;

/**
 * service ErrorService {
 *    rpc ReportError(ReportErrorRequest) returns (ReportErrorResponse) {
 * 		option (google.api.http) = {
 * 			post: "/v1/report"
 * 			body: "*"
 * 		};
 * 	}
 * }
 *
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
     * @param \Ueg\Api\Error\ReportErrorRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ReportError(\Ueg\Api\Error\ReportErrorRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ueg.api.error.ErrorService/ReportError',
        $argument,
        ['\Ueg\Api\Error\ReportErrorResponse', 'decode'],
        $metadata, $options);
    }

}
