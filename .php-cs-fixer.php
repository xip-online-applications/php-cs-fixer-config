<?php

declare(strict_types=1);

$finder = \PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src');

$config = new \XIP\CS\Config\DefaultConfig();
$config->setFinder($finder)
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache');

return $config;