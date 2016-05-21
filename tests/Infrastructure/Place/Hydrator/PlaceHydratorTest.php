<?php

namespace Arthem\GoogleApi\Test\Infrastructure\Place\Hydrator;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Infrastructure\Place\Hydrator\PlaceHydrator;
use Arthem\GooglePlaces\Test\Utils\PlaceData;

class PlaceHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $data
     * @param Place $expectedPlace
     * @dataProvider getPlacesData
     */
    public function testHydrate(array $data, Place $expectedPlace)
    {
        $hydrator = new PlaceHydrator();
        $place = $hydrator->hydratePlace($data);

        $this->assertEquals($expectedPlace, $place);
    }

    /**
     * @return array
     */
    public function getPlacesData()
    {
        return PlaceData::getPlaceProvider();
    }
}
