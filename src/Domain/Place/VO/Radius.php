<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

use Arthem\GoogleApi\Domain\Place\Exception\InvalidRadiusException;

class Radius
{
    /**
     * @var float
     */
    private $radius;

    /**
     * @param float $radius
     */
    public function __construct($radius)
    {
        if (!is_int($radius) && !is_float($radius)) {
            throw new InvalidRadiusException(
                sprintf(
                    'Invalid radius: expected float or int, got %s',
                    gettype($radius)
                )
            );
        }
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function getRadius()
    {
        return $this->radius;
    }
}
