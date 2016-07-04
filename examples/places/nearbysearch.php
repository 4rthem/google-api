<?php

namespace Arthem\GoogleApi\Example;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\Query\Search\NearbySearchHandler;
use Arthem\GoogleApi\Domain\Place\Query\Search\NearbySearchQuery;
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

$query = new NearbySearchQuery(48.866112, 2.334922, 1000);

$places = (new NearbySearchHandler($client))->handle($query);

/** @var Place $place */
foreach ($places as $place) {
    print_r($serializer->serialize($place));
}
