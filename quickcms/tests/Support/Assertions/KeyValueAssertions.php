<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

final class KeyValueAssertions
{
    public static function make(): array
    {
        return [
            'type' => 'key-value',

            'keyLabel' => 'Key',

            'valueLabel' => 'Value',

            'keyPlaceholder' => 'APP_NAME',

            'valuePlaceholder' => 'QuickCMS',

            'editableKeys' => true,

            'editableValues' => true,

            'addable' => true,

            'deletable' => true,

            'reorderable' => true,

            'valueType' => 'text',
        ];
    }
}
