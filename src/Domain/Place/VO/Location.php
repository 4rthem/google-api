<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

use Arthem\GoogleApi\Domain\Place\Exception\InvalidCoordinateException;

class Location
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->assertFloat('latitude', $latitude);
        $this->assertFloat('longitude', $longitude);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    private function assertFloat($type, $coordinate)
    {
        if (!is_float($coordinate)) {
            throw new InvalidCoordinateException(
                sprintf(
                    'Invalid %s: expected float, got %s',
                    $type,
                    gettype($coordinate)
                )
            );
        }
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    public function __toString()
    {
        return $this->getLatitude().','.$this->getLongitude();
    }
}
