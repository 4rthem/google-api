<?php

namespace Arthem\GoogleApi\Domain\Place\Query\Search;

use Arthem\GoogleApi\Domain\Place\VO\Location;
use Arthem\GoogleApi\Domain\Place\VO\Query;
use Arthem\GoogleApi\Domain\Place\VO\Radius;

class TextSearchQuery
{
    /**
     * @var Query
     */
    private $query;

    /**
     * @var Location
     */
    private $location;

    /**
     * @var Radius
     */
    private $radius;

    /**
     * @param string         $query
     * @param float|null     $latitude
     * @param float|null     $longitude
     * @param int|float|null $radius
     */
    public function __construct($query, $latitude = null, $longitude = null, $radius = null)
    {
        $this->query = new Query($query);

        if (null !== $latitude) {
            $this->location = new Location($latitude, $longitude);
        }

        if (null !== $radius) {
            $this->radius = new Radius($radius);
        }
    }

    /**
     * @return Query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return Location|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return Radius|null
     */
    public function getRadius()
    {
        return $this->radius;
    }
}
