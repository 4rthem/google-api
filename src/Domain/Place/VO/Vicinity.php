<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

class Vicinity
{
    /**
     * @var string
     */
    private $address;

    /**
     * @param string $address
     */
    public function __construct($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}
