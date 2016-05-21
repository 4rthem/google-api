<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('vendor')
    ->in(__DIR__ . '/src');

return Symfony\CS\Config\Config::create()
    ->fixers(['strict_param', 'short_array_syntax'])
    ->finder($finder);
