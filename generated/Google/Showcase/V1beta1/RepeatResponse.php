<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: tests/Integration/compliance.proto

namespace Google\Showcase\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>google.showcase.v1beta1.RepeatResponse</code>
 */
class RepeatResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.google.showcase.v1beta1.ComplianceData info = 1;</code>
     */
    protected $info = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Showcase\V1beta1\ComplianceData $info
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Tests\Integration\Compliance::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.google.showcase.v1beta1.ComplianceData info = 1;</code>
     * @return \Google\Showcase\V1beta1\ComplianceData
     */
    public function getInfo()
    {
        return isset($this->info) ? $this->info : null;
    }

    public function hasInfo()
    {
        return isset($this->info);
    }

    public function clearInfo()
    {
        unset($this->info);
    }

    /**
     * Generated from protobuf field <code>.google.showcase.v1beta1.ComplianceData info = 1;</code>
     * @param \Google\Showcase\V1beta1\ComplianceData $var
     * @return $this
     */
    public function setInfo($var)
    {
        GPBUtil::checkMessage($var, \Google\Showcase\V1beta1\ComplianceData::class);
        $this->info = $var;

        return $this;
    }

}

