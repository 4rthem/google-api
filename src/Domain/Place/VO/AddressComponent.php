<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

class AddressComponent
{
    /**
     * @var string
     */
    private $longName;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var array
     */
    private $types;

    /**
     * @param string $longName
     * @param string $shortName
     * @param array  $types
     */
    public function __construct($longName, $shortName, array $types)
    {
        $this->longName = $longName;
        $this->shortName = $shortName;
        $this->types = $types;
    }

    /**
     * @return string
     */
    public function getLongName()
    {
        return $this->longName;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param string $type The requested type
     *
     * @return bool
     */
    public function hasType($type)
    {
        return in_array($type, $this->types, true);
    }
}
