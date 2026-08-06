<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\Blocks\Block\BlockSchema;
use App\Core\Schema\Form\Input\Markdown\MarkdownSchema;
use App\Core\Schema\Form\Input\Text\TextInputSchema;

final class BlockBuilderFactory
{
    public static function make(): BlockSchema
    {
        return (new BlockSchema())
            ->name('hero')
            ->label('Hero')
            ->description('Hero block')
            ->icon('hero')
            ->schema([
                TextInputSchema::make()
                    ->name('title'),

                MarkdownSchema::make()
                    ->name('content'),
            ]);
    }
}
