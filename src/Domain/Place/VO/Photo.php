<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

class Photo
{
    /**
     * @var string
     */
    private $reference;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @param string $reference
     * @param int    $width
     * @param int    $height
     */
    public function __construct($reference, $width, $height)
    {
        $this->reference = $reference;
        $this->width     = $width;
        $this->height    = $height;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}
