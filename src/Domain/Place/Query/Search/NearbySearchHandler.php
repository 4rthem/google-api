<?php

namespace Arthem\GoogleApi\Domain\Place\Query\Search;

use Arthem\GoogleApi\Domain\Place\Query\AbstractHandler;
use Arthem\GoogleApi\Domain\Place\VO\PlaceCollection;

class NearbySearchHandler extends AbstractHandler
{
    /**
     * @param NearbySearchQuery $query
     *
     * @return PlaceCollection
     */
    public function handle(NearbySearchQuery $query)
    {
        $location = $query->getLocation();
        $params = [
            'location' => $location->getLatitude().','.$location->getLongitude(),
        ];

        if (null !== $query->getName()) {
            $params['name'] = $query->getName();
        }

        if (null !== $query->getRadius()) {
            $params['radius'] = $query->getRadius()->getRadius();
        }

        if (null !== $rankBy = $query->getRankBy()) {
            $params['rankby'] = $rankBy;
        }

        if (null !== $types = $query->getTypes()) {
            $params['types'] = implode('|', $types);
        }

        return $this->client->nearbysearch($params);
    }
}
