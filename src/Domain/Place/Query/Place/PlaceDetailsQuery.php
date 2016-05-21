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
     * @param PlaceId $id
     */
    public function __construct(PlaceId $id)
    {
        $this->id = $id;
    }

    /**
     * @return PlaceId
     */
    public function getId()
    {
        return $this->id;
    }
}
