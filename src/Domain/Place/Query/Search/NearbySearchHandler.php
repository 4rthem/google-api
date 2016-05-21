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
            'location' => $location->getLongitude().','.$location->getLatitude(),
            'radius' => $query->getRadius()->getRadius(),
        ];

        if (null !== $query->getName()) {
            $params['name'] = $query->getName();
        }

        $response = $this->client->nearbysearch($params);

        return $this->hydratePlacesFromResponse($response);
    }
}
