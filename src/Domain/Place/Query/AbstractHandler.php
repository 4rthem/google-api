<?php

namespace Arthem\GoogleApi\Domain\Place\Query;

use Arthem\GoogleApi\Domain\Place\Client\PlaceClientInterface;
use Arthem\GoogleApi\Domain\Place\Hydrator\PlaceHydrator;
use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\VO\PlaceCollection;

class AbstractHandler
{
    /**
     * @var PlaceClientInterface
     */
    protected $client;

    /**
     * @var PlaceHydrator
     */
    private $placeHydrator;

    /**
     * @param PlaceClientInterface $client
     * @param PlaceHydrator        $placeHydrator
     */
    public function __construct(PlaceClientInterface $client, PlaceHydrator $placeHydrator)
    {
        $this->client = $client;
        $this->placeHydrator = $placeHydrator;
    }

    /**
     * @param array $response
     *
     * @return Place
     */
    protected function hydratePlaceFromResponse(array $response)
    {
        return $this->placeHydrator->hydratePlace($response['result']);
    }

    /**
     * @param array $response
     *
     * @return PlaceCollection
     */
    protected function hydratePlacesFromResponse(array $response)
    {
        return $this->placeHydrator->hydratePlaces($response['results']);
    }
}
