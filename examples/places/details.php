<?php

namespace Arthem\GoogleApi\Example;

use Arthem\GoogleApi\Domain\Place\Query\Place\PlaceDetailsHandler;
use Arthem\GoogleApi\Domain\Place\Query\Place\PlaceDetailsQuery;
use Arthem\GoogleApi\Infrastructure\Client\Decoder\JsonDecoder;
use Arthem\GoogleApi\Infrastructure\Logger\EchoLogger;
use Arthem\GoogleApi\Infrastructure\Place\Hydrator\PlaceHydrator;
use Arthem\GoogleApi\Infrastructure\Place\PlaceClient;
use Arthem\GoogleApi\Infrastructure\Place\Serializer\PlaceSerializer;
use GuzzleHttp\Client;

require_once __DIR__.'/../../vendor/autoload.php';

$client = new PlaceClient(new Client(), new JsonDecoder(), 'YOUR_API_KEY_HERE', new PlaceHydrator());
$client->setLogger(new EchoLogger());
$serializer = new PlaceSerializer();

$query = new PlaceDetailsQuery('ChIJN1t_tDeuEmsRUsoyG83frY4');
$place = (new PlaceDetailsHandler($client))->handle($query);

print_r($serializer->serialize($place));
