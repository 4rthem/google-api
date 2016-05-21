<?php

namespace Arthem\GoogleApi\Domain\Place\Hydrator;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\VO\FormattedAddress;
use Arthem\GoogleApi\Domain\Place\VO\FormattedPhoneNumber;
use Arthem\GoogleApi\Domain\Place\VO\Icon;
use Arthem\GoogleApi\Domain\Place\VO\InternationalPhoneNumber;
use Arthem\GoogleApi\Domain\Place\VO\Location;
use Arthem\GoogleApi\Domain\Place\VO\PlaceCollection;
use Arthem\GoogleApi\Domain\Place\VO\PlaceId;
use Arthem\GoogleApi\Domain\Place\VO\PlaceName;
use Arthem\GoogleApi\Domain\Place\VO\Type;
use Arthem\GoogleApi\Domain\Place\VO\TypeCollection;
use Arthem\GoogleApi\Domain\Place\VO\Url;
use Arthem\GoogleApi\Domain\Place\VO\Vicinity;
use Arthem\GoogleApi\Domain\Place\VO\Website;

class PlaceHydrator
{
    /**
     * @param array $data
     *
     * @return Place
     */
    public function hydratePlace(array $data)
    {
        $place = new Place();

        if (!isset($data['geometry']['location'])) {
            return;
        }

        $location = $data['geometry']['location'];

        $place
            ->setId(new PlaceId($data['place_id']))
            ->setName(new PlaceName($data['name']))
            ->setLocation(new Location($location['lat'], $location['lng']));

        if (!empty($data['vicinity'])) {
            $place->setVicinity(new Vicinity($data['vicinity']));
        }

        if (!empty($data['formatted_address'])) {
            $place->setFormattedAddress(new FormattedAddress($data['formatted_address']));
        }
        if (!empty($data['formatted_phone_number'])) {
            $place->setFormattedPhoneNumber(new FormattedPhoneNumber($data['formatted_phone_number']));
        }
        if (!empty($data['icon'])) {
            $place->setIcon(new Icon($data['icon']));
        }
        if (!empty($data['international_phone_number'])) {
            $place->setInternationalPhoneNumber(new InternationalPhoneNumber($data['international_phone_number']));
        }
        if (!empty($data['url'])) {
            $place->setUrl(new Url($data['url']));
        }
        if (!empty($data['website'])) {
            $place->setWebsite(new Website($data['website']));
        }

        if (!empty($data['types'])) {
            $types = [];
            foreach ($data['types'] as $typeData) {
                $types[] = new Type($typeData);
            }
            $place->setTypes(new TypeCollection($types));
        }

        return $place;
    }

    /**
     * @param array $placesData
     *
     * @return PlaceCollection
     */
    public function hydratePlaces(array $placesData)
    {
        $places = new PlaceCollection();

        foreach ($placesData as $placeData) {
            $places->addPlace($this->hydratePlace($placeData));
        }

        return $places;
    }
}
