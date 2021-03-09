<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grpc/service_config/service_config.proto

namespace Grpc\Service_config;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Configuration for lrs LB policy.
 *
 * Generated from protobuf message <code>grpc.service_config.LrsLoadBalancingPolicyConfig</code>
 */
class LrsLoadBalancingPolicyConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Cluster name.  Required.
     *
     * Generated from protobuf field <code>string cluster_name = 1;</code>
     */
    protected $cluster_name = '';
    /**
     * EDS service name, as returned in CDS.
     * May be unset if not specified in CDS.
     *
     * Generated from protobuf field <code>string eds_service_name = 2;</code>
     */
    protected $eds_service_name = '';
    /**
     * Server to send load reports to.  Required.
     * If set to empty string, load reporting will be sent to the same
     * server as we are getting xds data from.
     *
     * Generated from protobuf field <code>string lrs_load_reporting_server_name = 3;</code>
     */
    protected $lrs_load_reporting_server_name = '';
    /**
     * Generated from protobuf field <code>.grpc.service_config.LrsLoadBalancingPolicyConfig.Locality locality = 4;</code>
     */
    protected $locality = null;
    /**
     * Endpoint-picking policy.
     *
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig child_policy = 5;</code>
     */
    private $child_policy;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $cluster_name
     *           Cluster name.  Required.
     *     @type string $eds_service_name
     *           EDS service name, as returned in CDS.
     *           May be unset if not specified in CDS.
     *     @type string $lrs_load_reporting_server_name
     *           Server to send load reports to.  Required.
     *           If set to empty string, load reporting will be sent to the same
     *           server as we are getting xds data from.
     *     @type \Grpc\Service_config\LrsLoadBalancingPolicyConfig\Locality $locality
     *     @type \Grpc\Service_config\LoadBalancingConfig[]|\Google\Protobuf\Internal\RepeatedField $child_policy
     *           Endpoint-picking policy.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Grpc\ServiceConfig\ServiceConfig::initOnce();
        parent::__construct($data);
    }

    /**
     * Cluster name.  Required.
     *
     * Generated from protobuf field <code>string cluster_name = 1;</code>
     * @return string
     */
    public function getClusterName()
    {
        return $this->cluster_name;
    }

    /**
     * Cluster name.  Required.
     *
     * Generated from protobuf field <code>string cluster_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setClusterName($var)
    {
        GPBUtil::checkString($var, True);
        $this->cluster_name = $var;

        return $this;
    }

    /**
     * EDS service name, as returned in CDS.
     * May be unset if not specified in CDS.
     *
     * Generated from protobuf field <code>string eds_service_name = 2;</code>
     * @return string
     */
    public function getEdsServiceName()
    {
        return $this->eds_service_name;
    }

    /**
     * EDS service name, as returned in CDS.
     * May be unset if not specified in CDS.
     *
     * Generated from protobuf field <code>string eds_service_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setEdsServiceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->eds_service_name = $var;

        return $this;
    }

    /**
     * Server to send load reports to.  Required.
     * If set to empty string, load reporting will be sent to the same
     * server as we are getting xds data from.
     *
     * Generated from protobuf field <code>string lrs_load_reporting_server_name = 3;</code>
     * @return string
     */
    public function getLrsLoadReportingServerName()
    {
        return $this->lrs_load_reporting_server_name;
    }

    /**
     * Server to send load reports to.  Required.
     * If set to empty string, load reporting will be sent to the same
     * server as we are getting xds data from.
     *
     * Generated from protobuf field <code>string lrs_load_reporting_server_name = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setLrsLoadReportingServerName($var)
    {
        GPBUtil::checkString($var, True);
        $this->lrs_load_reporting_server_name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.grpc.service_config.LrsLoadBalancingPolicyConfig.Locality locality = 4;</code>
     * @return \Grpc\Service_config\LrsLoadBalancingPolicyConfig\Locality
     */
    public function getLocality()
    {
        return isset($this->locality) ? $this->locality : null;
    }

    public function hasLocality()
    {
        return isset($this->locality);
    }

    public function clearLocality()
    {
        unset($this->locality);
    }

    /**
     * Generated from protobuf field <code>.grpc.service_config.LrsLoadBalancingPolicyConfig.Locality locality = 4;</code>
     * @param \Grpc\Service_config\LrsLoadBalancingPolicyConfig\Locality $var
     * @return $this
     */
    public function setLocality($var)
    {
        GPBUtil::checkMessage($var, \Grpc\Service_config\LrsLoadBalancingPolicyConfig\Locality::class);
        $this->locality = $var;

        return $this;
    }

    /**
     * Endpoint-picking policy.
     *
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig child_policy = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getChildPolicy()
    {
        return $this->child_policy;
    }

    /**
     * Endpoint-picking policy.
     *
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig child_policy = 5;</code>
     * @param \Grpc\Service_config\LoadBalancingConfig[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setChildPolicy($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Grpc\Service_config\LoadBalancingConfig::class);
        $this->child_policy = $arr;

        return $this;
    }

}
