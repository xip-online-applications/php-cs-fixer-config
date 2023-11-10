# PHP Coding Standards Fixer
This project extends [PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) and applies a basic set of rules defined by the XIP Team. A list with all enabled rules and their config can be found in the [docs](./docs/index.rst).

## Supported PHP Versions
- PHP 7.4
- PHP 8.0 (except PHP 8.0.0 due to bug in PHP tokenizer)
- PHP 8.1
- PHP 8.2

## Installation
```
composer require --dev xip-online-applications/php-cs-fixer-config
```

Create a file named `.php-cs-fixer.php` in the root folder of your project.
```
<?php

declare(strict_types=1);

$finder = \PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src');

$config = new \XIP\CS\Config\DefaultConfig();
$config->setFinder($finder)
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache');

return $config;
```
This config extends php cs fixers config and therefore can be used in the same way. All functionality like `$config->setRules([...])` or `$config->setRiskyAllowd(false)`.