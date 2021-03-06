<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: ueg/api/error/error.proto

namespace Ueg\Api\Error;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\GPBWrapperUtils;

/**
 * Generated from protobuf message <code>ueg.api.error.StackReport</code>
 */
class StackReport extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string errorMessage = 1;</code>
     */
    private $errorMessage = '';
    /**
     * Generated from protobuf field <code>string filename = 2;</code>
     */
    private $filename = '';
    /**
     * Generated from protobuf field <code>string lineNumber = 3;</code>
     */
    private $lineNumber = '';
    /**
     * Generated from protobuf field <code>string stackTrace = 4;</code>
     */
    private $stackTrace = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $errorMessage
     *     @type string $filename
     *     @type string $lineNumber
     *     @type string $stackTrace
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Ueg\Api\Error\Error::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string errorMessage = 1;</code>
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Generated from protobuf field <code>string errorMessage = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setErrorMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->errorMessage = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string filename = 2;</code>
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Generated from protobuf field <code>string filename = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setFilename($var)
    {
        GPBUtil::checkString($var, True);
        $this->filename = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string lineNumber = 3;</code>
     * @return string
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Generated from protobuf field <code>string lineNumber = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setLineNumber($var)
    {
        GPBUtil::checkString($var, True);
        $this->lineNumber = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string stackTrace = 4;</code>
     * @return string
     */
    public function getStackTrace()
    {
        return $this->stackTrace;
    }

    /**
     * Generated from protobuf field <code>string stackTrace = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setStackTrace($var)
    {
        GPBUtil::checkString($var, True);
        $this->stackTrace = $var;

        return $this;
    }

}

