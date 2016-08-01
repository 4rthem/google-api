<?php

namespace Arthem\GoogleApi\Infrastructure\Client;

use Arthem\GoogleApi\Infrastructure\Client\Decoder\DecoderInterface;
use Arthem\GoogleApi\Infrastructure\Client\Exception\ClientErrorException;
use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

abstract class Client implements LoggerAwareInterface
{
    /**
     * @var string
     */
    protected $apiUrl;

    /**
     * The client API key.
     *
     * @var string
     */
    private $apiKey;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var DecoderInterface
     */
    private $decoder;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param ClientInterface  $httpClient
     * @param DecoderInterface $decoder
     * @param string           $apiKey
     */
    public function __construct(ClientInterface $httpClient, DecoderInterface $decoder, $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->decoder = $decoder;
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array  $parameters
     * @param array  $options
     *
     * @return array
     *
     * @throws ClientErrorException
     */
    public function request($method, $uri, array $parameters = [], array $options = [])
    {
        $parameters['key'] = $this->apiKey;
        $options['query'] = $parameters;

        $uri = $this->apiUrl.$uri.'/json';

        $this->log($method, $uri, $options);
        $response = $this->httpClient->request($method, $uri, $options);

        $result = $this->decoder->decode($response);

        if (!isset($result['status'])) {
            throw new ClientErrorException('Missing return status');
        }

        if (!in_array($result['status'], [
                'OK',
                'ZERO_RESULTS',
            ], true)) {
            throw new ClientErrorException(sprintf('Invalid return status "%s"', $result['status']));
        }

        return $result;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array  $options
     */
    private function log($method, $uri, array $options = [])
    {
        if (null === $this->logger) {
            return;
        }

        $this->logger->info(
            sprintf(
                'google-api request: %s %s',
                $method,
                $uri
            ),
            [
                'params' => http_build_query(
                    $options['query']
                ),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }
}
