<?php

namespace Arthem\GoogleApi\Domain\Place\Query\Place;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\Query\AbstractHandler;

class PlaceDetailsHandler extends AbstractHandler
{
    /**
     * @param PlaceDetailsQuery $query
     *
     * @return Place
     */
    public function handle(PlaceDetailsQuery $query)
    {
        $params = [
            'placeid' => $query->getId()->getId(),
        ];

        $response = $this->client->details($params);

        return $this->hydratePlaceFromResponse($response);
    }
}
