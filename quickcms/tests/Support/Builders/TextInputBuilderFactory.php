<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\Text\TextInputSchema;

final class TextInputBuilderFactory
{
    public static function make(): TextInputSchema
    {
        return TextInputSchema::make()
            ->name('title')
            ->placeholder('Title')
            ->validation(
                ValidationBuilderFactory::make(),
            );
    }
}
