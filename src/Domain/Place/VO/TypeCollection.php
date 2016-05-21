<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

use Arthem\GoogleApi\Domain\Place\Exception\InvalidTypeException;

class TypeCollection implements \IteratorAggregate
{
    /**
     * @var Type[]
     */
    private $types;

    /**
     * @param Type[] $types
     */
    public function __construct(array $types = [])
    {
        foreach ($types as $type) {
            if (!$type instanceof Type) {
                throw new InvalidTypeException(sprintf('Expected instance of %s, got %s', Type::class, gettype($type)));
            }
        }

        $this->types = $types;
    }

    /**
     * @param Type $type
     *
     * @return $this
     */
    public function addType(Type $type)
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->types);
    }
}
