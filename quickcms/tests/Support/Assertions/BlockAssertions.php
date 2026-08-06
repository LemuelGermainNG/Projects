<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

use App\Core\Schema\Form\Input\Markdown\MarkdownSchema;
use App\Core\Schema\Form\Input\Text\TextInputSchema;

final class BlockAssertions
{
    public static function make(): array
    {
        return [
            'name' => 'hero',

            'label' => 'Hero',

            'description' => 'Hero block',

            'icon' => 'hero',

            'schema' => SchemaAssertions::compileMany([
                TextInputSchema::make()
                    ->name('title'),

                MarkdownSchema::make()
                    ->name('content'),
            ]),
        ];
    }
}
