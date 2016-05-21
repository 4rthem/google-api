<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

class FormattedPhoneNumber
{
    /**
     * @var string
     */
    private $number;

    /**
     * @param string $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }
}
