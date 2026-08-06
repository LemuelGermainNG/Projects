<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class RichEditorAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'rich-editor',

            'toolbar' => [
                'heading',
                'bold',
                'italic',
                'table',
                'image',
            ],

            'preview' => true,

            'autosave' => true,

            'upload' => true,

            'mentions' => true,

            'tables' => true,

            'attachments' => true,

            'bubbleMenu' => true,

            'floatingMenu' => true,

            'slashCommands' => true,

            'comments' => true,

            'collaboration' => true,

            'embeds' => [
                'youtube',
                'figma',
            ],
        ];
    }
}
