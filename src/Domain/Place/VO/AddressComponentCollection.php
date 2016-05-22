<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

class AddressComponentCollection implements \IteratorAggregate
{
    /**
     * @var AddressComponent[]
     */
    private $components = [];

    /**
     * @param AddressComponent $component
     *
     * @return $this
     */
    public function addComponent(AddressComponent $component)
    {
        $this->components[] = $component;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return AddressComponent|null
     */
    public function findOneComponentByType($type)
    {
        foreach ($this->components as $component) {
            if ($component->hasType($type)) {
                return $component;
            }
        }
    }

    /**
     * @param string $type
     *
     * @return array
     */
    public function findComponentsByType($type)
    {
        $components = [];
        foreach ($this->components as $component) {
            if ($component->hasType($type)) {
                $components[] = $component;
            }
        }

        return $components;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->components);
    }
}
