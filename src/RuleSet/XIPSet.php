<?php

declare(strict_types=1);

namespace XIP\CS\RuleSet;

use PhpCsFixer\RuleSet\AbstractRuleSetDescription;

final class XIPSet extends AbstractRuleSetDescription
{
    public function getRules(): array
    {
        return $this->getRulesFromRuleSet([
            '@PhpCsFixer' => true,
            '@Symfony' => true,
            '@Symfony:risky' => true,
            '@PHP82Migration' => true,
            '@PHP74Migration:risky' => true,
            'concat_space' => ['spacing' => 'one'],
        ]);
    }

    public function getDescription(): string
    {
        return 'XIP Online Applications default RuleSet';
    }

    private function getRulesFromRuleSet(array $ruleSet): array
    {
        $foundRules = [];

        foreach ($ruleSet as $rule => $values) {
            if (str_contains($rule, '@')) {
                $className  = sprintf(
                    'PhpCsFixer\\RuleSet\\Sets\\%sSet',
                    str_replace(':risky', 'Risky', trim($rule, '@'))
                );

                if (class_exists($className)) {
                    $ruleSet = new $className();
                    $foundRules = array_merge($foundRules, $this->getRulesFromRuleSet($ruleSet->getRules()));
                }

                continue;
            }

            $foundRules[$rule] = $values;
        }

        return $foundRules;
    }
}
