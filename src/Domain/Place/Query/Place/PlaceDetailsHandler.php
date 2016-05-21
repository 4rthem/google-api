<?php

namespace Arthem\GoogleApi\Domain\Place\Query\Place;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\Query\AbstractHandler;
use Arthem\GooglePlaces\Domain\Place\Exception\PlaceNotFoundException;

class PlaceDetailsHandler extends AbstractHandler
{
    /**
     * @param PlaceDetailsQuery $query
     *
     * @return Place
     *
     * @throws PlaceNotFoundException
     */
    public function handle(PlaceDetailsQuery $query)
    {
        $params = [
            'placeid' => $query->getId()->getId(),
        ];

        return $this->client->details($params);
    }
}
