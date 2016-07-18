<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

class PhotoCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var Photo[]
     */
    private $photos;

    /**
     * @param Photo $photo
     *
     * @return $this
     */
    public function addPhoto(Photo $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->photos);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->photos);
    }
}
