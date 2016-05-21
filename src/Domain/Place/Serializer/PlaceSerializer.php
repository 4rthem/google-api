<?php

namespace Arthem\GoogleApi\Domain\Place\Serializer;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\VO\Type;
use Arthem\GoogleApi\Domain\Place\VO\TypeCollection;

class PlaceSerializer
{
    /**
     * @param Place $place
     *
     * @return array
     */
    public function serialize(Place $place)
    {
        $data = [
        ];

        $types = $this->serializeTypes($place->getTypes());
        if (!empty($types)) {
            $data['types'] = $types;
        }
        if (null !== $place->getId()) {
            $data['id'] = $place->getId()->getId();
        }
        if (null !== $place->getName()) {
            $data['name'] = $place->getName()->getName();
        }
        if (null !== $place->getLocation()) {
            $data['location'] = $place->getLocation();
        }
        if (null !== $place->getIcon()) {
            $data['icon'] = $place->getIcon()->getUrl();
        }
        if (null !== $place->getVicinity()) {
            $data['vicinity'] = $place->getVicinity()->getAddress();
        }
        if (null !== $place->getFormattedAddress()) {
            $data['formatted_address'] = $place->getFormattedAddress()->getAddress();
        }
        if (null !== $place->getFormattedPhoneNumber()) {
            $data['formatted_phone_number'] = $place->getFormattedPhoneNumber()->getNumber();
        }
        if (null !== $place->getInternationalPhoneNumber()) {
            $data['international_phone_number'] = $place->getInternationalPhoneNumber()->getNumber();
        }
        if (null !== $place->getUrl()) {
            $data['url'] = $place->getUrl()->getUrl();
        }
        if (null !== $place->getWebsite()) {
            $data['website'] = $place->getWebsite()->getUrl();
        }

        return $data;
    }

    /**
     * @param TypeCollection $types
     *
     * @return array
     */
    private function serializeTypes(TypeCollection $types)
    {
        $typesData = [];
        /** @var Type $type */
        foreach ($types as $type) {
            $typesData[] = $type->getType();
        }

        return $typesData;
    }
}
