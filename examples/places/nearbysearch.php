<?php

namespace Arthem\GoogleApi\Example;

use Arthem\GoogleApi\Domain\Place\Place;
use Arthem\GoogleApi\Domain\Place\Query\Search\NearbySearchHandler;
use Arthem\GoogleApi\Domain\Place\Query\Search\NearbySearchQuery;
use Arthem\GoogleApi\Domain\Place\Serializer\PlaceSerializer;
use Arthem\GoogleApi\Infrastructure\Client\Decoder\JsonDecoder;
use Arthem\GoogleApi\Infrastructure\Logger\EchoLogger;
use Arthem\GoogleApi\Infrastructure\Place\Hydrator\PlaceHydrator;
use Arthem\GoogleApi\Infrastructure\Place\PlaceClient;
use GuzzleHttp\Client;

require_once __DIR__.'/../../vendor/autoload.php';

$client = new PlaceClient(new Client(), new JsonDecoder(), 'AIzaSyDtms0HAKybIq3LFVgf0AqN9zXXJ6QJO4c',  new PlaceHydrator());
$client->setLogger(new EchoLogger());
$serializer = new PlaceSerializer();

$query = new NearbySearchQuery(2.334922, 48.866112, 1000);

$places = (new NearbySearchHandler($client, new PlaceHydrator()))->handle($query);

/** @var Place $place */
foreach ($places as $place) {
    print_r($serializer->serialize($place));
}
