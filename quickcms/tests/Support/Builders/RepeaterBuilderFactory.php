<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\Repeater\RepeaterSchema;
use App\Core\Schema\Form\Input\Text\TextInputSchema;
use App\Core\Support\Enum\Repeater\RepeaterLayout;

final class RepeaterBuilderFactory
{
    public static function make(): RepeaterSchema
    {
        return RepeaterSchema::make()
            ->schema([
                TextInputSchema::make()
                    ->name('title'),

                TextInputSchema::make()
                    ->name('description'),
            ])
            ->defaultItems(1)
            ->minItems(1)
            ->maxItems(10)
            ->itemLabel('Item')
            ->layout(
                RepeaterLayout::Grid,
            )
            ->cloneable()
            ->collapsible()
            ->reorderable();
    }
}
