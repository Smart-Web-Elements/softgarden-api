<?php

namespace SWE\SoftGardenApi\Api;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class SoftGardenBasic
 *
 * This class holds some basic methods and information for the requests.
 *
 * @package SWE\SoftGardenApi\Api
 * @author Luca Braun <l.braun@s-w-e.com>
 * @abstract
 */
abstract class SoftGardenBasic
{
    /**
     * The api domain.
     *
     * @var string
     */
    protected static string $domain = 'https://api.softgarden.io/api/rest';
    /**
     * The SoftGardenBasic instance.
     *
     * @var SoftGardenBasic
     */
    protected static SoftGardenBasic $instance;
    /**
     * The api version. Some requests have to be done in v2, others in v3.
     *
     * @var int
     */
    protected int $version = 3;
    /**
     * The requested rest uri.
     *
     * @var string
     */
    protected string $uri;
    /**
     * The client id, used for the authentication.
     *
     * @var string
     */
    protected string $clientId;
    /**
     * The Guzzle HTTP Client, used for easy requests.
     *
     * @var Client
     */
    protected Client $client;

    /**
     * SoftGarden constructor.
     *
     * @param string $clientId OPTIONAL. The client id for the authentication of each request.
     */
    public function __construct(string $clientId = '')
    {
        // Check if the DEBUG constant is set.
        self::checkDebugConstant();
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        // Get the SoftGardenBasic instance.
        if (isset(static::$instance)) {
            return static::getInstance($clientId);
        }

        // Set the basic uri to the client so the base domain don't have to be set every time.
        $clientOptions = [
            'base_uri' => static::$domain,
        ];

        // Set the client id and create the client instance.
        $this->clientId = $clientId;
        $this->client = new Client($clientOptions);
        static::$instance = $this;

        return static::$instance;
    }

    /**
     * Get the client id.
     *
     * @return string
     */
    public function getClientId(): string
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        return $this->clientId;
    }

    /**
     * Set the client id.
     *
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }
        $this->clientId = $clientId;
    }

    /**
     * Execute the request and return the response.
     *
     * @param bool $post OPTIONAL. Use the post method. Defaults to false.
     * @param array $postFields OPTIONAL. The post arguments that will be sent als query parameters.
     * @return array The decoded json response as associative array.
     * @throws GuzzleException
     */
    protected function getResponse(bool $post = false, array $postFields = []): array
    {
        $method = $post ? 'POST' : 'GET';
        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'auth' => [
                $this->clientId,
                '',
            ],
        ];

        if (!empty($postFields)) {
            $options['query'] = $postFields;
        }

        if (DEBUG) {
            var_dump(__METHOD__);
            var_dump('Url: ' . $this->getUrl());
            var_dump('Method: ' . $method);
            var_dump(
                'Options: ' . json_encode($options, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            );
        }

        $response = $this->client->request($method, $this->getUrl(), $options);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Get the rest url.
     *
     * @return string The rest url built with the domain, version number and the uri, set from the method.
     */
    private function getUrl(): string
    {
        return sprintf('%s/v%d/%s', static::$domain, $this->version, $this->uri);
    }

    /**
     * Get the SoftGardenBasic instance.
     *
     * @param string $clientId OPTIONAL. The client id, used for the authentication.
     * @return SoftGardenBasic The SoftGardenBasic instance.
     */
    public static function getInstance(string $clientId = ''): SoftGardenBasic
    {
        self::checkDebugConstant();
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        if (static::$instance) {
            if (!empty($clientId)) {
                static::$instance->setClientId($clientId);
            }

            return static::$instance;
        }

        static::$instance = new static($clientId);

        return static::$instance;
    }

    /**
     * Check if the DEBUG constant is defined. If not, define the constant to false.
     */
    private static function checkDebugConstant(): void
    {
        if (!defined('DEBUG')) {
            define('DEBUG', false);
        }
    }
}
