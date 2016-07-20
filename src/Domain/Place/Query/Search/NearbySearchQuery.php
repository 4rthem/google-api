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
     * @var string
     */
    private $rankBy;

    /**
     * @var array
     */
    private $types = [];

    /**
     * @param float          $latitude
     * @param float          $longitude
     * @param int|float|null $radius
     * @param string|null    $name
     */
    public function __construct($latitude, $longitude, $radius = null, $name = null)
    {
        $this->location = new Location($latitude, $longitude);
        if (null !== $radius) {
            $this->radius = new Radius($radius);
        }

        if (!empty($name)) {
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

    /**
     * @return string
     */
    public function getRankBy()
    {
        return $this->rankBy;
    }

    /**
     * @param string $rankBy
     * @return $this
     */
    public function setRankBy($rankBy)
    {
        $this->rankBy = $rankBy;

        return $this;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param array $types
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;

        return $this;
    }
}
