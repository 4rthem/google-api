<?php

namespace Arthem\GoogleApi\Test\Place\Serializer;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\Serializer\PlaceSerializer;
use Arthem\GoogleApi\Domain\Place\VO\FormattedAddress;
use Arthem\GoogleApi\Domain\Place\VO\FormattedPhoneNumber;
use Arthem\GoogleApi\Domain\Place\VO\Icon;
use Arthem\GoogleApi\Domain\Place\VO\InternationalPhoneNumber;
use Arthem\GoogleApi\Domain\Place\VO\Location;
use Arthem\GoogleApi\Domain\Place\VO\PlaceId;
use Arthem\GoogleApi\Domain\Place\VO\PlaceName;
use Arthem\GoogleApi\Domain\Place\VO\Type;
use Arthem\GoogleApi\Domain\Place\VO\TypeCollection;
use Arthem\GoogleApi\Domain\Place\VO\Url;
use Arthem\GoogleApi\Domain\Place\VO\Vicinity;
use Arthem\GoogleApi\Domain\Place\VO\Website;

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

    public function getPlacesData()
    {
        $data = [];

        $data[] = [
            [
                'name' => 'foo',
            ],
            (new Place())
                ->setName(new PlaceName('foo')),
        ];

        $data[] = [
            [
                'id' => 'foo-bar_123',
                'name' => 'bar',
            ],
            (new Place())
                ->setId(new PlaceId('foo-bar_123'))
                ->setName(new PlaceName('bar')),
        ];

        $data[] = [
            [
                'id' => 'foo-bar_123',
                'name' => 'baz',
                'types' => ['point_of_interest', 'school'],
            ],
            (new Place())
                ->setId(new PlaceId('foo-bar_123'))
                ->setName(new PlaceName('baz'))
                ->setTypes(
                    new TypeCollection(
                        [
                            new Type('point_of_interest'),
                            new Type('school'),
                        ]
                    )
                ),
        ];

        $data[] = [
            [
                'id' => 'foo-bar_123',
                'name' => 'baz',
                'types' => ['point_of_interest', 'school'],
                'location' => '12.3,45.6',
                'icon' => 'http://my-domain.com/my-icon.gif',
                'vicinity' => 'My vicinity',
                'formatted_address' => 'My formatted address',
                'formatted_phone_number' => 'My formatted phone number',
                'international_phone_number' => 'My international phone number',
                'url' => 'http://my-domain.com/my-url',
                'website' => 'http://my-domain.com/my-website',
            ],
            (new Place())
                ->setId(new PlaceId('foo-bar_123'))
                ->setName(new PlaceName('baz'))
                ->setIcon(new Icon('http://my-domain.com/my-icon.gif'))
                ->setVicinity(new Vicinity('My vicinity'))
                ->setFormattedAddress(new FormattedAddress('My formatted address'))
                ->setFormattedPhoneNumber(new FormattedPhoneNumber('My formatted phone number'))
                ->setInternationalPhoneNumber(new InternationalPhoneNumber('My international phone number'))
                ->setUrl(new Url('http://my-domain.com/my-url'))
                ->setWebsite(new Website('http://my-domain.com/my-website'))
                ->setLocation(new Location(12.3, 45.6))
                ->setTypes(
                    new TypeCollection(
                        [
                            new Type('point_of_interest'),
                            new Type('school'),
                        ]
                    )
                ),
        ];

        return $data;
    }
}
