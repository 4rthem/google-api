<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

use Arthem\GoogleApi\Domain\Place\Exception\InvalidPlaceNameException;

class PlaceName
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        if (!is_string($name)) {
            throw new InvalidPlaceNameException(sprintf('PlaceName must be a string, got %s', gettype($name)));
        }

        if (empty($name)) {
            throw new InvalidPlaceNameException('PlaceName must not be empty');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
