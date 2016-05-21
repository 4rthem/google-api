<?php

namespace Arthem\GoogleApi\Infrastructure\Logger;

use Psr\Log\AbstractLogger;

class EchoLogger extends AbstractLogger
{
    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = [])
    {
        echo $message;

        if (!empty($context)) {
            echo ' [';
            foreach ($context as $key => $value) {
                echo sprintf('%s: %s', $key, $value);
            }
            echo ']';
        }
    }
}
