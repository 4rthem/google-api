<?php

namespace Arthem\GoogleApi\Infrastructure\Logger;

use Psr\Log\AbstractLogger;

class EchoLogger extends AbstractLogger
{
    public function log($level, $message, array $context = [])
    {
        echo $message;
    }
}
