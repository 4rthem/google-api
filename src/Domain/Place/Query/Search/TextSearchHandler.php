<?php

namespace Arthem\GoogleApi\Domain\Place\Query\Search;

use Arthem\GoogleApi\Domain\Place\Query\AbstractHandler;
use Arthem\GoogleApi\Domain\Place\VO\PlaceCollection;

class TextSearchHandler extends AbstractHandler
{
    /**
     * @param TextSearchQuery $query
     *
     * @return PlaceCollection
     */
    public function handle(TextSearchQuery $query)
    {
        $location = $query->getLocation();

        $params = [
            'query' => $query->getQuery()->getQuery(),
        ];

        if (null !== $location) {
            $params['location'] = $location->getLatitude().','.$location->getLongitude();
        }

        if (null !== $query->getRadius()) {
            $params['radius'] = $query->getRadius()->getRadius();
        }

        return $this->client->textsearch($params);
    }
}
