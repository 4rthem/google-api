<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

use Arthem\GoogleApi\Domain\Place\Place;

class PlaceCollection implements \IteratorAggregate
{
    /**
     * @var Place[]
     */
    private $places = [];

    /**
     * @param Place[] $places
     */
    public function __construct(array $places = [])
    {
        $this->places = $places;
    }

    /**
     * @param Place $place
     *
     * @return $this
     */
    public function addPlace(Place $place)
    {
        $this->places[] = $place;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->places);
    }
}
