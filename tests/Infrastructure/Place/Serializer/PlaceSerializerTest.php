<?php

namespace Arthem\GoogleApi\Test\Infrastructure\Place\Serializer;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Infrastructure\Place\Serializer\PlaceSerializer;
use Arthem\GooglePlaces\Test\Utils\PlaceData;

class PlaceSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $expectedData
     * @param Place $place
     * @dataProvider getPlacesData
     */
    public function testSerialize(array $expectedData, Place $place)
    {
        $serializer = new PlaceSerializer();
        $data = $serializer->serialize($place);

        $this->assertEquals($expectedData, $data);
    }

    /**
     * @return array
     */
    public function getPlacesData()
    {
        return PlaceData::getPlaceProvider();
    }
}
