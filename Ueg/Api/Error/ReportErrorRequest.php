<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: ueg/api/error/error.proto

namespace Ueg\Api\Error;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\GPBWrapperUtils;

/**
 * Generated from protobuf message <code>ueg.api.error.ReportErrorRequest</code>
 */
class ReportErrorRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.ueg.api.error.Credentials credentials = 1;</code>
     */
    private $credentials = null;
    /**
     * Generated from protobuf field <code>string errorGroupName = 2;</code>
     */
    private $errorGroupName = '';
    /**
     * Generated from protobuf field <code>.ueg.api.error.StackReport stackReport = 3;</code>
     */
    private $stackReport = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.Struct customData = 4;</code>
     */
    private $customData = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Ueg\Api\Error\Credentials $credentials
     *     @type string $errorGroupName
     *     @type \Ueg\Api\Error\StackReport $stackReport
     *     @type \Google\Protobuf\Struct $customData
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Ueg\Api\Error\Error::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.ueg.api.error.Credentials credentials = 1;</code>
     * @return \Ueg\Api\Error\Credentials
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * Generated from protobuf field <code>.ueg.api.error.Credentials credentials = 1;</code>
     * @param \Ueg\Api\Error\Credentials $var
     * @return $this
     */
    public function setCredentials($var)
    {
        GPBUtil::checkMessage($var, \Ueg\Api\Error\Credentials::class);
        $this->credentials = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string errorGroupName = 2;</code>
     * @return string
     */
    public function getErrorGroupName()
    {
        return $this->errorGroupName;
    }

    /**
     * Generated from protobuf field <code>string errorGroupName = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setErrorGroupName($var)
    {
        GPBUtil::checkString($var, True);
        $this->errorGroupName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.ueg.api.error.StackReport stackReport = 3;</code>
     * @return \Ueg\Api\Error\StackReport
     */
    public function getStackReport()
    {
        return $this->stackReport;
    }

    /**
     * Generated from protobuf field <code>.ueg.api.error.StackReport stackReport = 3;</code>
     * @param \Ueg\Api\Error\StackReport $var
     * @return $this
     */
    public function setStackReport($var)
    {
        GPBUtil::checkMessage($var, \Ueg\Api\Error\StackReport::class);
        $this->stackReport = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Struct customData = 4;</code>
     * @return \Google\Protobuf\Struct
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Struct customData = 4;</code>
     * @param \Google\Protobuf\Struct $var
     * @return $this
     */
    public function setCustomData($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Struct::class);
        $this->customData = $var;

        return $this;
    }

}

