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
        $data = [];

        $this->setId($place, $data);
        $this->setName($place, $data);
        $this->setLocation($place, $data);
        $this->setTypes($place, $data);
        $this->setIcon($place, $data);
        $this->setVicinity($place, $data);
        $this->setFormattedAddress($place, $data);
        $this->setFormattedPhoneNumber($place, $data);
        $this->setInternationalPhoneNumber($place, $data);
        $this->setUrl($place, $data);
        $this->setWebsite($place, $data);

        return $data;
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setId(Place $place, array &$data)
    {
        if (null !== $place->getId()) {
            $data['id'] = $place->getId()->getId();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setName(Place $place, array &$data)
    {
        if (null !== $place->getName()) {
            $data['name'] = $place->getName()->getName();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setLocation(Place $place, array &$data)
    {
        if (null !== $place->getLocation()) {
            $data['location'] = $place->getLocation();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setTypes(Place $place, array &$data)
    {
        $types = $this->serializeTypes($place->getTypes());
        if (!empty($types)) {
            $data['types'] = $types;
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setIcon(Place $place, array &$data)
    {
        if (null !== $place->getIcon()) {
            $data['icon'] = $place->getIcon()->getUrl();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setVicinity(Place $place, array &$data)
    {
        if (null !== $place->getVicinity()) {
            $data['vicinity'] = $place->getVicinity()->getAddress();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setFormattedAddress(Place $place, array &$data)
    {
        if (null !== $place->getFormattedAddress()) {
            $data['formatted_address'] = $place->getFormattedAddress()->getAddress();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setFormattedPhoneNumber(Place $place, array &$data)
    {
        if (null !== $place->getFormattedPhoneNumber()) {
            $data['formatted_phone_number'] = $place->getFormattedPhoneNumber()->getNumber();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setInternationalPhoneNumber(Place $place, array &$data)
    {
        if (null !== $place->getInternationalPhoneNumber()) {
            $data['international_phone_number'] = $place->getInternationalPhoneNumber()->getNumber();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setUrl(Place $place, array &$data)
    {
        if (null !== $place->getUrl()) {
            $data['url'] = $place->getUrl()->getUrl();
        }
    }

    /**
     * @param Place $place
     * @param array $data
     */
    private function setWebsite(Place $place, array &$data)
    {
        if (null !== $place->getWebsite()) {
            $data['website'] = $place->getWebsite()->getUrl();
        }
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
