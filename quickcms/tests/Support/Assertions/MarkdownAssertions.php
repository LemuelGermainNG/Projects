<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class MarkdownAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'markdown',

            'toolbar' => [
                'heading',
                'bold',
                'italic',
            ],

            'preview' => true,

            'autosave' => true,

            'frontMatter' => true,

            'html' => true,

            'syntaxHighlight' => true,

            'tableOfContents' => true,

            'mermaid' => true,

            'emoji' => true,

            'flavor' => 'github',
        ];
    }
}
