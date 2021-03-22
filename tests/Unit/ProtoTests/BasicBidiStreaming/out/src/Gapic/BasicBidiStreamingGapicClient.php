<?php
/*
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/tests/Unit/ProtoTests/BasicBidiStreaming/basic-bidi-streaming.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Testing\BasicBidiStreaming\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\Call;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Testing\BasicBidiStreaming\EmptyRequest;
use Testing\BasicBidiStreaming\Request;
use Testing\BasicBidiStreaming\Response;

/**
 * Service Description:
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $basicBidiStreamingClient = new BasicBidiStreamingClient();
 * try {
 *     $aNumber = 0;
 *     $request = new Request();
 *     $request->setANumber($aNumber);
 *     // Write all requests to the server, then read all responses until the
 *     // stream is complete
 *     $requests = [
 *         $request,
 *     ];
 *     $stream = $basicBidiStreamingClient->methodBidi();
 *     $stream->writeAll($requests);
 *     foreach ($stream->closeWriteAndReadAll() as $element) {
 *         // doSomethingWith($element);
 *     }
 *     // Alternatively:
 *     // Write requests individually, making read() calls if
 *     // required. Call closeWrite() once writes are complete, and read the
 *     // remaining responses from the server.
 *     $requests = [
 *         $request,
 *     ];
 *     $stream = $basicBidiStreamingClient->methodBidi();
 *     foreach ($requests as $request) {
 *         $stream->write($request);
 *         // if required, read a single response from the stream
 *         $element = $stream->read();
 *         // doSomethingWith($element)
 *     }
 *     $stream->closeWrite();
 *     $element = $stream->read();
 *     while (!is_null($element)) {
 *         // doSomethingWith($element)
 *         $element = $stream->read();
 *     }
 * } finally {
 *     $basicBidiStreamingClient->close();
 * }
 * ```
 */
class BasicBidiStreamingGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'testing.basicbidistreaming.BasicBidiStreaming';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'bidi.example.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/basic_bidi_streaming_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/basic_bidi_streaming_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/basic_bidi_streaming_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/basic_bidi_streaming_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'bidi.example.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $serviceAddress setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     *
     * Sample code:
     * ```
     * $basicBidiStreamingClient = new BasicBidiStreamingClient();
     * try {
     *     $aNumber = 0;
     *     $request = new Request();
     *     $request->setANumber($aNumber);
     *     // Write all requests to the server, then read all responses until the
     *     // stream is complete
     *     $requests = [
     *         $request,
     *     ];
     *     $stream = $basicBidiStreamingClient->methodBidi();
     *     $stream->writeAll($requests);
     *     foreach ($stream->closeWriteAndReadAll() as $element) {
     *         // doSomethingWith($element);
     *     }
     *     // Alternatively:
     *     // Write requests individually, making read() calls if
     *     // required. Call closeWrite() once writes are complete, and read the
     *     // remaining responses from the server.
     *     $requests = [
     *         $request,
     *     ];
     *     $stream = $basicBidiStreamingClient->methodBidi();
     *     foreach ($requests as $request) {
     *         $stream->write($request);
     *         // if required, read a single response from the stream
     *         $element = $stream->read();
     *         // doSomethingWith($element)
     *     }
     *     $stream->closeWrite();
     *     $element = $stream->read();
     *     while (!is_null($element)) {
     *         // doSomethingWith($element)
     *         $element = $stream->read();
     *     }
     * } finally {
     *     $basicBidiStreamingClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type int $timeoutMillis
     *           Timeout to use for this call.
     * }
     *
     * @return \Google\ApiCore\BidiStream
     *
     * @throws ApiException if the remote call fails
     */
    public function methodBidi(array $optionalArgs = [])
    {
        return $this->startCall('MethodBidi', Response::class, $optionalArgs, null, Call::BIDI_STREAMING_CALL);
    }

    /**
     *
     * Sample code:
     * ```
     * $basicBidiStreamingClient = new BasicBidiStreamingClient();
     * try {
     *     $request = new EmptyRequest();
     *     // Write all requests to the server, then read all responses until the
     *     // stream is complete
     *     $requests = [
     *         $request,
     *     ];
     *     $stream = $basicBidiStreamingClient->methodEmpty();
     *     $stream->writeAll($requests);
     *     foreach ($stream->closeWriteAndReadAll() as $element) {
     *         // doSomethingWith($element);
     *     }
     *     // Alternatively:
     *     // Write requests individually, making read() calls if
     *     // required. Call closeWrite() once writes are complete, and read the
     *     // remaining responses from the server.
     *     $requests = [
     *         $request,
     *     ];
     *     $stream = $basicBidiStreamingClient->methodEmpty();
     *     foreach ($requests as $request) {
     *         $stream->write($request);
     *         // if required, read a single response from the stream
     *         $element = $stream->read();
     *         // doSomethingWith($element)
     *     }
     *     $stream->closeWrite();
     *     $element = $stream->read();
     *     while (!is_null($element)) {
     *         // doSomethingWith($element)
     *         $element = $stream->read();
     *     }
     * } finally {
     *     $basicBidiStreamingClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type int $timeoutMillis
     *           Timeout to use for this call.
     * }
     *
     * @return \Google\ApiCore\BidiStream
     *
     * @throws ApiException if the remote call fails
     */
    public function methodEmpty(array $optionalArgs = [])
    {
        return $this->startCall('MethodEmpty', Response::class, $optionalArgs, null, Call::BIDI_STREAMING_CALL);
    }
}
