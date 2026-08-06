<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\KeyValue;

use App\Core\Schema\Form\Base\BaseInputBuilder;
use App\Core\Schema\Schema;

final class KeyValueBuilder extends BaseInputBuilder
{
    public static function schema(): string
    {
        return KeyValueSchema::class;
    }

    public function build(): array
    {
        /** @var KeyValueSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'keyLabel',
            $this->evaluate($schema->keyLabel()),
        );

        $this->addIfNotNull(
            $data,
            'valueLabel',
            $this->evaluate($schema->valueLabel()),
        );

        $this->addIfNotNull(
            $data,
            'keyPlaceholder',
            $this->evaluate($schema->keyPlaceholder()),
        );

        $this->addIfNotNull(
            $data,
            'valuePlaceholder',
            $this->evaluate($schema->valuePlaceholder()),
        );

        $this->addIfNotNull(
            $data,
            'editableKeys',
            $this->evaluate($schema->isEditableKeys()),
        );

        $this->addIfNotNull(
            $data,
            'editableValues',
            $this->evaluate($schema->isEditableValues()),
        );

        $this->addIfNotNull(
            $data,
            'addable',
            $this->evaluate($schema->isAddable()),
        );

        $this->addIfNotNull(
            $data,
            'deletable',
            $this->evaluate($schema->isDeletable()),
        );

        $this->addIfNotNull(
            $data,
            'reorderable',
            $this->evaluate($schema->isReorderable()),
        );

        $valueType = $this->evaluate(
            $schema->valueType(),
        );

        if ($valueType instanceof Schema) {
            $valueType = $valueType->compile(
                $this->registry,
            );
        } elseif ($valueType instanceof \BackedEnum) {
            $valueType = $valueType->value;
        }

        $this->addIfNotNull(
            $data,
            'valueType',
            $valueType,
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
