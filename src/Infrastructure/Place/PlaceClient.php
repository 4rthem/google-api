<?php

namespace Arthem\GoogleApi\Infrastructure\Place;

use Arthem\GoogleApi\Domain\Place\Client\PlaceClientInterface;
use Arthem\GoogleApi\Infrastructure\Client\Client;

class PlaceClient extends Client implements PlaceClientInterface
{
    /**
     * {@inheritdoc}
     */
    protected $apiUrl = 'https://maps.googleapis.com/maps/api/place';

    /**
     * {@inheritdoc}
     */
    public function nearbysearch(array $params)
    {
        return $this->request('GET', '/nearbysearch', $params);
    }

    /**
     * {@inheritdoc}
     */
    public function details(array $params)
    {
        return $this->request('GET', '/details', $params);
    }
}
