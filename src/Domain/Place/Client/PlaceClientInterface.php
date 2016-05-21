<?php

namespace Arthem\GoogleApi\Domain\Place\Client;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\VO\PlaceCollection;
use Arthem\GooglePlaces\Domain\Place\Exception\PlaceNotFoundException;

interface PlaceClientInterface
{
    /**
     * @param array $params
     *
     * @return PlaceCollection
     */
    public function nearbysearch(array $params);

    /**
     * @param array $params
     *
     * @return Place
     *
     * @throws PlaceNotFoundException
     */
    public function details(array $params);
}
