<?php

namespace Arthem\GooglePlaces\Test\Utils;

use Arthem\GoogleApi\Domain\Place\Place;
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

class PlaceData
{
    /**
     * @return array
     */
    public static function getPlaceProvider()
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
            [],
            new Place(),
        ];

        $data[] = [
            [
                'place_id' => 'foo-bar_123',
                'name' => 'bar',
            ],
            (new Place())
                ->setId(new PlaceId('foo-bar_123'))
                ->setName(new PlaceName('bar')),
        ];

        $data[] = [
            [
                'place_id' => 'foo-bar_123',
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
                'place_id' => 'foo-bar_123',
                'name' => 'baz',
                'types' => ['point_of_interest', 'school'],
                'geometry' => [
                    'location' => [
                        'lat' => 12.3,
                        'lng' => 45.6,
                    ],
                ],
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
