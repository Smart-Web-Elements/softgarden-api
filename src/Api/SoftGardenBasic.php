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
    public const METHOD_GET = 'GET';

    public const METHOD_POST = 'POST';

    public const METHOD_DELETE = 'DELETE';

    public const METHODS = [
        self::METHOD_GET,
        self::METHOD_POST,
        self::METHOD_DELETE,
    ];

    /**
     * The api domain.
     *
     * @var string
     */
    protected static string $domain = 'https://api.softgarden.io/api/rest';
    /**
     * The SoftGardenBasic instance.
     *
     * @var SoftGardenBasic|null
     */
    private static ?SoftGardenBasic $instance = null;
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
     * The client secret, used for the authentication.
     *
     * @var string
     */
    protected string $clientSecret;
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
     * @param string $clientSecret OPTIONAL. The client secret for the authentication of each post request.
     */
    private function __construct(string $clientId = '', string $clientSecret = '')
    {
        // Check if the DEBUG constant is set.
        self::checkDebugConstant();
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        // Set the basic uri to the client so the base domain don't have to be set every time.
        $clientOptions = [
            'base_uri' => static::$domain,
        ];

        // Set the client id and create the client instance.
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->client = new Client($clientOptions);
    }

    /**
     * Get the SoftGardenBasic instance.
     *
     * @param string $clientId OPTIONAL. The client id, used for the authentication.
     * @return SoftGardenBasic The SoftGardenBasic instance.
     */
    public static function getInstance(string $clientId = '', string $clientSecret = ''): SoftGardenBasic
    {
        self::checkDebugConstant();
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        if (static::$instance) {
            if (!empty($clientId)) {
                static::$instance->setClientId($clientId);
            }

            if (!empty($clientSecret)) {
                static::$instance->setClientSecret($clientSecret);
            }

            return static::$instance;
        }

        static::$instance = new static($clientId, $clientSecret);

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
     * Get the client secret.
     *
     * @return string
     */
    public function getClientSecret(): string
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        return $this->clientSecret;
    }

    /**
     * Set the client secret.
     *
     * @param string $clientSecret
     */
    public function setClientSecret(string $clientSecret): void
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }
        $this->clientSecret = $clientSecret;
    }

    /**
     * Execute the request and return the response.
     *
     * @param string $method OPTIONAL. Set the request method. Defaults to METHOD_GET.
     * @param array $postFields OPTIONAL. The post arguments that will be sent als query parameters.
     * @param string $token OPTIONAL. An access token to do some specific requests.
     * @param bool $json OPTIONAL. The content type should be in json.
     * @return array The decoded json response as associative array.
     * @throws GuzzleException
     */
    protected function sendResponse(
        string $method = self::METHOD_GET,
        array $postFields = [],
        string $token = '',
        bool $json = true
    ): array {
        if (!in_array($method, self::METHODS)) {
            $method = self::METHOD_GET;
        }

        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'auth' => [
                $this->clientId,
                $this->clientSecret,
            ],
        ];

        if (!$json) {
            $options['headers']['Content-Type'] = 'application/x-www-form-urlencoded';
        }

        if (empty($token) && empty($this->clientSecret) && $method === self::METHOD_POST) {
            $options['headers']['Authorization'] = 'Basic ' . base64_encode($this->clientId);
            unset($options['auth']);
        }

        if (!empty($postFields)) {
            if ($method === self::METHOD_POST) {
                if ($json) {
                    $options['json'] = $postFields;
                } else {
                    $options['form_params'] = $postFields;
                }
            } else {
                $options['query'] = $postFields;
            }
        }

        if (!empty($token)) {
            $options['headers']['Authorization'] = 'Bearer ' . $token;
            unset($options['auth']);
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
        $responseBody = $response->getBody()->getContents();
        $decodedResponse = json_decode($responseBody, true);

        if (is_null($decodedResponse)) {
            $decodedResponse = $responseBody;
        }

        return is_array($decodedResponse) ? $decodedResponse : [$decodedResponse];
    }

    /**
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * @return void
     */
    private function __wakeup()
    {
    }

    /**
     * Get the rest url.
     *
     * @return string The rest url built with the domain, version number and the uri, set from the method.
     */
    private function getUrl(): string
    {
        $arguments = [
            static::$domain,
            $this->version,
            $this->uri,
        ];
        $template = '%s/v%d/%s';

        if ($this->version === 0) {
            $template = '%s/%s';
            unset($arguments[1]);
        }

        return vsprintf($template, $arguments);
    }
}
