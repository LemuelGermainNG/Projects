<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Input\KeyValue\KeyValueSchema;
use App\Core\Support\Enum\KeyValue\ValueType;

final class KeyValueBuilderFactory
{
    public static function make(): KeyValueSchema
    {
        return KeyValueSchema::make()
            ->keyLabel('Key')
            ->valueLabel('Value')
            ->keyPlaceholder('APP_NAME')
            ->valuePlaceholder('QuickCMS')
            ->editableKeys()
            ->editableValues()
            ->addable()
            ->deletable()
            ->reorderable()
            ->valueType(
                ValueType::Text,
            );
    }
}
