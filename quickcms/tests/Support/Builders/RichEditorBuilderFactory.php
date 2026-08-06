<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\RichEditor\RichEditorSchema;
use App\Core\Support\Enum\Editor\ToolbarItem;
use App\Core\Support\Enum\RichEditor\EmbedProvider;

final class RichEditorBuilderFactory
{
    public static function make(): RichEditorSchema
    {
        return RichEditorSchema::make()
            ->toolbar([
                ToolbarItem::Heading,
                ToolbarItem::Bold,
                ToolbarItem::Italic,
                ToolbarItem::Table,
                ToolbarItem::Image,
            ])
            ->preview()
            ->autosave()
            ->upload()
            ->mentions()
            ->tables()
            ->attachments()
            ->bubbleMenu()
            ->floatingMenu()
            ->slashCommands()
            ->comments()
            ->collaboration()
            ->embeds([
                EmbedProvider::YouTube,
                EmbedProvider::Figma,
            ]);
    }
}
