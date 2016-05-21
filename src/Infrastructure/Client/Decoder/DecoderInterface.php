<?php

namespace Arthem\GoogleApi\Infrastructure\Client\Decoder;

use Psr\Http\Message\ResponseInterface;

interface DecoderInterface
{
    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    public function decode(ResponseInterface $response);
}
