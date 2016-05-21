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
     * @param ClientInterface $httpClient
     * @param string          $apiKey
     */
    public function __construct(ClientInterface $httpClient, $decoder, $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->decoder = $decoder;
        $this->httpClient = $httpClient;
    }

    /**
     * {@inheritdoc}
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array  $parameters
     * @param array  $options
     *
     * @return array
     */
    public function request($method, $uri, array $parameters = [], array $options = [])
    {
        $parameters['key'] = $this->apiKey;

        $options['query'] = $parameters;

        $uri = $this->apiUrl.$uri.'/json';

        if (null !== $this->logger) {
            $this->logger->info(
                sprintf(
                    'google api client: %s %s [%s]',
                    $method,
                    $uri,
                    http_build_query(
                        $options['query']
                    )
                )
            );
        }

        $response = $this->httpClient->request($method, $uri, $options);

        $result = $this->decoder->decode($response);

        if (isset($result['status']) && 'OK' !== $result['status']) {
            throw new ClientErrorException(sprintf('Invalid return status "%s"', $result['status']));
        }

        return $result;
    }
}