<?php

namespace Arthem\GoogleApi\Infrastructure\Place;

use Arthem\GoogleApi\Domain\Place\Client\PlaceClientInterface;
use Arthem\GoogleApi\Infrastructure\Client\Client;
use Arthem\GoogleApi\Infrastructure\Place\Hydrator\PlaceHydrator;
use Arthem\GooglePlaces\Domain\Place\Exception\PlaceNotFoundException;
use GuzzleHttp\ClientInterface;

class PlaceClient extends Client implements PlaceClientInterface
{
    /**
     * {@inheritdoc}
     */
    protected $apiUrl = 'https://maps.googleapis.com/maps/api/place';

    /**
     * @var PlaceHydrator
     */
    private $placeHydrator;

    public function __construct(ClientInterface $httpClient, $decoder, $apiKey, PlaceHydrator $placeHydrator)
    {
        parent::__construct($httpClient, $decoder, $apiKey);
        $this->placeHydrator = $placeHydrator;
    }

    /**
     * {@inheritdoc}
     */
    public function nearbysearch(array $params)
    {
        $response = $this->request('GET', '/nearbysearch', $params);

        return $this->placeHydrator->hydratePlaces($response['results']);
    }

    /**
     * {@inheritdoc}
     */
    public function details(array $params)
    {
        $response = $this->request('GET', '/details', $params);
        $place = $this->placeHydrator->hydratePlace($response['result']);

        if (null === $place) {
            throw new PlaceNotFoundException(sprintf('The place was not found'));
        }

        return $place;
    }
}
