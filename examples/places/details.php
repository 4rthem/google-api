<?php

namespace Arthem\GoogleApi\Example;

use Arthem\GoogleApi\Domain\Place\Query\Place\PlaceDetailsHandler;
use Arthem\GoogleApi\Domain\Place\Query\Place\PlaceDetailsQuery;
use Arthem\GoogleApi\Domain\Place\Serializer\PlaceSerializer;
use Arthem\GoogleApi\Domain\Place\VO\PlaceId;
use Arthem\GoogleApi\Infrastructure\Client\Decoder\JsonDecoder;
use Arthem\GoogleApi\Infrastructure\Logger\EchoLogger;
use Arthem\GoogleApi\Infrastructure\Place\Hydrator\PlaceHydrator;
use Arthem\GoogleApi\Infrastructure\Place\PlaceClient;
use GuzzleHttp\Client;

require_once __DIR__.'/../../vendor/autoload.php';

$client = new PlaceClient(new Client(), new JsonDecoder(), 'AIzaSyDtms0HAKybIq3LFVgf0AqN9zXXJ6QJO4c', new PlaceHydrator());
$client->setLogger(new EchoLogger());
$serializer = new PlaceSerializer();

$query = new PlaceDetailsQuery(new PlaceId('ChIJN1t_tDeuEmsRUsoyG83frY4'));
$place = (new PlaceDetailsHandler($client, new PlaceHydrator()))->handle($query);

print_r($serializer->serialize($place));
