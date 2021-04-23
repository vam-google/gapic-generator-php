<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: tests/Integration/compliance.proto

namespace Google\Showcase\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * ComplianceSuite contains a set of requests that microgenerators should issue
 * over REST to the Compliance service to test their gRPC-to-REST transcoding
 * implementation.
 *
 * Generated from protobuf message <code>google.showcase.v1beta1.ComplianceSuite</code>
 */
class ComplianceSuite extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .google.showcase.v1beta1.ComplianceGroup group = 1;</code>
     */
    private $group;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Showcase\V1beta1\ComplianceGroup[]|\Google\Protobuf\Internal\RepeatedField $group
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Tests\Integration\Compliance::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .google.showcase.v1beta1.ComplianceGroup group = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Generated from protobuf field <code>repeated .google.showcase.v1beta1.ComplianceGroup group = 1;</code>
     * @param \Google\Showcase\V1beta1\ComplianceGroup[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGroup($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Showcase\V1beta1\ComplianceGroup::class);
        $this->group = $arr;

        return $this;
    }

}

