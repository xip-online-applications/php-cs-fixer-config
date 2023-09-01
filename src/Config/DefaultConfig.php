<?php

declare(strict_types=1);

namespace XIP\CS\Config;

use PhpCsFixer\Config;
use XIP\CS\RuleSet\XIPSet;

final class DefaultConfig extends Config
{
    public function __construct()
    {
        parent::__construct('XIP Online Applications default config');

        $this->setRiskyAllowed(true);
    }

    public function getRules(): array
    {
        $rulesSet = new XIPSet();

        return array_merge($rulesSet->getRules(), parent::getRules());
    }
}
