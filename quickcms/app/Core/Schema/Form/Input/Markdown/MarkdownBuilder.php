<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Markdown;

use App\Core\Schema\Form\Base\EditorInputBaseBuilder;

final class MarkdownBuilder extends EditorInputBaseBuilder
{
    public static function schema(): string
    {
        return MarkdownSchema::class;
    }

    public function build(): array
    {
        /** @var MarkdownSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'frontMatter',
            $this->evaluate($schema->isFrontMatter()),
        );

        $this->addIfNotNull(
            $data,
            'html',
            $this->evaluate($schema->isHtml()),
        );

        $this->addIfNotNull(
            $data,
            'syntaxHighlight',
            $this->evaluate($schema->isSyntaxHighlight()),
        );

        $this->addIfNotNull(
            $data,
            'tableOfContents',
            $this->evaluate($schema->isTableOfContents()),
        );

        $this->addIfNotNull(
            $data,
            'mermaid',
            $this->evaluate($schema->isMermaid()),
        );

        $this->addIfNotNull(
            $data,
            'emoji',
            $this->evaluate($schema->isEmoji()),
        );

        $this->addIfNotNull(
            $data,
            'flavor',
            $this->evaluateEnum($schema->flavor()),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
