<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\Markdown\MarkdownSchema;
use App\Core\Support\Enum\Editor\ToolbarItem;
use App\Core\Support\Enum\Markdown\MarkdownFlavor;

final class MarkdownBuilderFactory
{
    public static function make(): MarkdownSchema
    {
        return MarkdownSchema::make()
            ->toolbar([
                ToolbarItem::Heading,
                ToolbarItem::Bold,
                ToolbarItem::Italic,
            ])
            ->preview()
            ->autosave()
            ->frontMatter()
            ->html()
            ->syntaxHighlight()
            ->tableOfContents()
            ->mermaid()
            ->emoji()
            ->flavor(
                MarkdownFlavor::GitHub,
            );
    }
}
