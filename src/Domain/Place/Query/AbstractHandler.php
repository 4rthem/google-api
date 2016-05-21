<?php

namespace Arthem\GoogleApi\Domain\Place\Query;

use Arthem\GoogleApi\Domain\Place\Client\PlaceClientInterface;

class AbstractHandler
{
    /**
     * @var PlaceClientInterface
     */
    protected $client;

    /**
     * @param PlaceClientInterface $client
     */
    public function __construct(PlaceClientInterface $client)
    {
        $this->client = $client;
    }
}
