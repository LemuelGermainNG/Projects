<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

use App\Core\Schema\Form\Input\Text\TextInputSchema;
use App\Core\Support\Enum\Repeater\RepeaterLayout;

final class RepeaterAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'repeater',

            'schema' => SchemaAssertions::compileMany([
                TextInputSchema::make(),

                TextInputSchema::make(),
            ]),

            'defaultItems' => 1,

            'minItems' => 1,

            'maxItems' => 10,

            'itemLabel' => 'Item',

            'layout' => RepeaterLayout::Grid->value,

            'cloneable' => true,

            'collapsible' => true,

            'reorderable' => true,
        ];
    }
}
