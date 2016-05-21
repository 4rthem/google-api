<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

use Arthem\GoogleApi\Domain\Place\Exception\InvalidPlaceIdException;

class PlaceId
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        if (!is_string($id)) {
            throw new InvalidPlaceIdException(sprintf('PlaceId must be a string, got %s', gettype($id)));
        }

        if (empty($id)) {
            throw new InvalidPlaceIdException('PlaceId must not be empty');
        }

        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
