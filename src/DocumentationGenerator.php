<?php

declare(strict_types=1);

namespace XIP\CS;

use PhpCsFixer\Documentation\DocumentationLocator;
use PhpCsFixer\Documentation\RuleSetDocumentationGenerator;
use PhpCsFixer\FixerFactory;
use Symfony\Component\Filesystem\Filesystem;

class DocumentationGenerator
{
    public static function generate(): void
    {
        $filesystem = new Filesystem();
        $locator = new DocumentationLocator();
        $documentGenerator = new RuleSetDocumentationGenerator($locator);

        $fixerFactory = new FixerFactory();
        $fixerFactory->registerBuiltInFixers();
        $fixers = $fixerFactory->getFixers();

        $docs = $documentGenerator->generateRuleSetsDocumentation(new RuleSet\XIPSet(), $fixers);

        // Replace local URI with public documentation URI
        $docs = str_replace(
            ['./..', '.rst'],
            ['https://cs.symfony.com/doc', '.html'],
            $docs
        );

        $filesystem->dumpFile('./docs/index.rst', $docs);
    }
}
