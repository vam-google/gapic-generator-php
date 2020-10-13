<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/longrunning/operations.proto

namespace Google\LongRunning;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The response message for [Operations.ListOperations][google.longrunning.Operations.ListOperations].
 *
 * Generated from protobuf message <code>google.longrunning.ListOperationsResponse</code>
 */
class ListOperationsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * A list of operations that matches the specified filter in the request.
     *
     * Generated from protobuf field <code>repeated .google.longrunning.Operation operations = 1;</code>
     */
    private $operations;
    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    protected $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\LongRunning\Operation[]|\Google\Protobuf\Internal\RepeatedField $operations
     *           A list of operations that matches the specified filter in the request.
     *     @type string $next_page_token
     *           The standard List next-page token.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        parent::__construct($data);
    }

    /**
     * A list of operations that matches the specified filter in the request.
     *
     * Generated from protobuf field <code>repeated .google.longrunning.Operation operations = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * A list of operations that matches the specified filter in the request.
     *
     * Generated from protobuf field <code>repeated .google.longrunning.Operation operations = 1;</code>
     * @param \Google\LongRunning\Operation[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOperations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\LongRunning\Operation::class);
        $this->operations = $arr;

        return $this;
    }

    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * The standard List next-page token.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

