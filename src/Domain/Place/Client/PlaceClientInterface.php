<?php

namespace Arthem\GoogleApi\Domain\Place\Client;

interface PlaceClientInterface
{
    /**
     * @param array $params
     *
     * @return array
     */
    public function nearbysearch(array $params);

    /**
     * @param array $params
     *
     * @return array
     */
    public function details(array $params);
}
