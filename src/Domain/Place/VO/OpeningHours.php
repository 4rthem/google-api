<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

class OpeningHours
{
    /**
     * @var string
     */
    private $weekdayText;

    /**
     * @param string $weekdayText
     */
    public function __construct($weekdayText)
    {
        $this->weekdayText = $weekdayText;
    }

    /**
     * @return string
     */
    public function getWeekdayText()
    {
        return $this->weekdayText;
    }
}
