<?php

namespace Arthem\GoogleApi\Domain\Place\Query\Place;

use Arthem\GoogleApi\Domain\Place\VO\PlaceId;

class PlaceDetailsQuery
{
    /**
     * @var PlaceId
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = new PlaceId($id);
    }

    /**
     * @return PlaceId
     */
    public function getId()
    {
        return $this->id;
    }
}
