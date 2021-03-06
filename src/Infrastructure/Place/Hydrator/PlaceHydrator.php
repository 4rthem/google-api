<?php

namespace Arthem\GoogleApi\Infrastructure\Place\Hydrator;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\VO\AddressComponent;
use Arthem\GoogleApi\Domain\Place\VO\FormattedAddress;
use Arthem\GoogleApi\Domain\Place\VO\FormattedPhoneNumber;
use Arthem\GoogleApi\Domain\Place\VO\Icon;
use Arthem\GoogleApi\Domain\Place\VO\InternationalPhoneNumber;
use Arthem\GoogleApi\Domain\Place\VO\Location;
use Arthem\GoogleApi\Domain\Place\VO\OpeningHours;
use Arthem\GoogleApi\Domain\Place\VO\Photo;
use Arthem\GoogleApi\Domain\Place\VO\PlaceCollection;
use Arthem\GoogleApi\Domain\Place\VO\PlaceId;
use Arthem\GoogleApi\Domain\Place\VO\PlaceName;
use Arthem\GoogleApi\Domain\Place\VO\Type;
use Arthem\GoogleApi\Domain\Place\VO\TypeCollection;
use Arthem\GoogleApi\Domain\Place\VO\Url;
use Arthem\GoogleApi\Domain\Place\VO\Vicinity;
use Arthem\GoogleApi\Domain\Place\VO\Website;
use Arthem\GooglePlaces\Infrastructure\Place\Exception\ResponseErrorException;

class PlaceHydrator
{
    /**
     * @param array $placesData
     *
     * @return PlaceCollection
     *
     * @throws ResponseErrorException When data is malformed
     */
    public function hydratePlaces(array $placesData)
    {
        $places = new PlaceCollection();

        foreach ($placesData as $placeData) {
            if (!is_array($placeData)) {
                throw new ResponseErrorException(
                    sprintf(
                        'place data is expected to be array, got %s',
                        gettype(
                            $placeData
                        )
                    )
                );
            }

            $places->addPlace($this->hydratePlace($placeData));
        }

        return $places;
    }

    /**
     * @param array $data
     *
     * @return Place
     */
    public function hydratePlace(array $data)
    {
        $place = new Place();

        $this->setPlaceId($place, $data);
        $this->setName($place, $data);
        $this->setLocation($place, $data);
        $this->setTypes($place, $data);
        $this->setVicinity($place, $data);
        $this->setFormattedAddress($place, $data);
        $this->setFormattedPhoneNumber($place, $data);
        $this->setIcon($place, $data);
        $this->setInternationalPhoneNumber($place, $data);
        $this->setUrl($place, $data);
        $this->setWebsite($place, $data);
        $this->setAddressComponents($place, $data);
        $this->setPhotos($place, $data);
        $this->setOpeningHours($place, $data);

        return $place;
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setPlaceId(Place $place, array $data)
    {
        if (!empty($data['place_id'])) {
            $place->setId(new PlaceId($data['place_id']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setName(Place $place, array $data)
    {
        if (!empty($data['name'])) {
            $place->setName(new PlaceName($data['name']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setLocation(Place $place, array $data)
    {
        if (!empty($data['geometry']['location'])) {
            $location = $data['geometry']['location'];
            $place->setLocation(new Location($location['lat'], $location['lng']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setTypes(Place $place, array $data)
    {
        if (!empty($data['types'])) {
            $types = [];
            foreach ($data['types'] as $typeData) {
                $types[] = new Type($typeData);
            }
            $place->setTypes(new TypeCollection($types));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setAddressComponents(Place $place, array $data)
    {
        if (empty($data['address_components'])) {
            return;
        }

        $components = $place->getAddressComponents();
        foreach ($data['address_components'] as $componentData) {
            $components->addComponent(
                new AddressComponent(
                    $componentData['long_name'],
                    $componentData['short_name'],
                    $componentData['types']
                )
            );
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setPhotos(Place $place, array $data)
    {
        if (empty($data['photos'])) {
            return;
        }

        $photos = $place->getPhotos();
        foreach ($data['photos'] as $photoData) {
            $photos->addPhoto(
                new Photo(
                    $photoData['photo_reference'],
                    $photoData['width'],
                    $photoData['height']
                )
            );
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setOpeningHours(Place $place, array $data)
    {
        if (empty($data['opening_hours'])) {
            return;
        }

        $weekdayText = $data['opening_hours']['weekday_text'];

        $place->setOpeningHours(new OpeningHours($weekdayText));
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setVicinity(Place $place, array $data)
    {
        if (!empty($data['vicinity'])) {
            $place->setVicinity(new Vicinity($data['vicinity']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setFormattedAddress(Place $place, array $data)
    {
        if (!empty($data['formatted_address'])) {
            $place->setFormattedAddress(new FormattedAddress($data['formatted_address']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setFormattedPhoneNumber(Place $place, array $data)
    {
        if (!empty($data['formatted_phone_number'])) {
            $place->setFormattedPhoneNumber(new FormattedPhoneNumber($data['formatted_phone_number']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setIcon(Place $place, array $data)
    {
        if (!empty($data['icon'])) {
            $place->setIcon(new Icon($data['icon']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setInternationalPhoneNumber(Place $place, array $data)
    {
        if (!empty($data['international_phone_number'])) {
            $place->setInternationalPhoneNumber(new InternationalPhoneNumber($data['international_phone_number']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setUrl(Place $place, array $data)
    {
        if (!empty($data['url'])) {
            $place->setUrl(new Url($data['url']));
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setWebsite(Place $place, array $data)
    {
        if (!empty($data['website'])) {
            $place->setWebsite(new Website($data['website']));
        }
    }
}
