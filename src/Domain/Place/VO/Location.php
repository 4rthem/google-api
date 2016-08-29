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
        $this->assertNumeric('latitude', $latitude);
        $this->assertNumeric('longitude', $longitude);

        $this->latitude = (float) $latitude;
        $this->longitude = (float) $longitude;
    }

    private function assertNumeric($type, $coordinate)
    {
        if (!is_float($coordinate) && !is_int($coordinate) && !is_double($coordinate)) {
            throw new InvalidCoordinateException(
                sprintf(
                    'Invalid %s: expected float, int or double, got %s',
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
