<?php

namespace Arthem\GoogleApi\Infrastructure\Client\Decoder;

use Psr\Http\Message\ResponseInterface;

class JsonDecoder implements DecoderInterface
{
    /**
     * {@inheritdoc}
     */
    public function decode(ResponseInterface $response)
    {
        $data = $response->getBody();

        return \GuzzleHttp\json_decode($data, true);
    }
}
