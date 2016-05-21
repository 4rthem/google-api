<?php

namespace Arthem\GoogleApi\Domain\Place\Query\Search;

use Arthem\GoogleApi\Domain\Place\VO\Location;
use Arthem\GoogleApi\Domain\Place\VO\PlaceName;
use Arthem\GoogleApi\Domain\Place\VO\Radius;

class NearbySearchQuery
{
    /**
     * @var Location
     */
    private $location;

    /**
     * @var Radius
     */
    private $radius;

    /**
     * @var PlaceName
     */
    private $name;

    /**
     * @param float  $latitude
     * @param float  $longitude
     * @param float  $radius
     * @param string $name
     */
    public function __construct($latitude, $longitude, $radius, $name = null)
    {
        $this->location = new Location($latitude, $longitude);
        $this->radius = new Radius($radius);

        if ($name) {
            $this->name = new PlaceName($name);
        }
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return Radius
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @return PlaceName
     */
    public function getName()
    {
        return $this->name;
    }
}
