<?php

namespace Arthem\GoogleApi\Domain\Place\VO;

use Arthem\GoogleApi\Domain\Place\Exception\InvalidQueryException;

class Query
{
    /**
     * The text query.
     * eg: "pizza in New York"
     *
     * @var string
     */
    private $query;

    /**
     * @param string $query
     */
    public function __construct($query)
    {
        if (!is_string($query)) {
            throw new InvalidQueryException(sprintf('query must be a string, got %s', gettype($query)));
        }

        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }
}
