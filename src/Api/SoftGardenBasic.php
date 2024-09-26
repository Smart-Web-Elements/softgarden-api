<?php

namespace SWE\SoftGardenApi\Api;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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

    protected static string $domain = 'https://api.softgarden.io/api/rest';
    private static ?SoftGardenBasic $instance = null;
    protected int $version = 3;
    protected string $uri;
    protected string $clientId;
    protected string $clientSecret;
    protected Client $client;

    private function __construct(string $clientId = '', string $clientSecret = '')
    {
        // Check if the DEBUG constant is set.
        self::checkDebugConstant();
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        // Set the basic uri to the client so the base domain doesn't have to be set every time.
        $clientOptions = [
            'base_uri' => static::$domain,
        ];

        // Set the client id and create the client instance.
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->client = new Client($clientOptions);
    }

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

    private static function checkDebugConstant(): void
    {
        if (!defined('DEBUG')) {
            define('DEBUG', false);
        }
    }

    public function getClientId(): string
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        return $this->clientId;
    }

    public function setClientId(string $clientId): void
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }
        $this->clientId = $clientId;
    }

    public function getClientSecret(): string
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }

        return $this->clientSecret;
    }

    public function setClientSecret(string $clientSecret): void
    {
        if (DEBUG) {
            var_dump(__METHOD__);
        }
        $this->clientSecret = $clientSecret;
    }

    /**
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
                'Options: ' . json_encode($options, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
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

    private function __clone() {}

    private function __wakeup() {}

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
