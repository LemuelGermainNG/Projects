<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Repeater;

use App\Core\Schema\Form\Base\BaseInputBuilder;
use App\Core\Schema\Schema;

final class RepeaterBuilder extends BaseInputBuilder
{
    public static function schema(): string
    {
        return RepeaterSchema::class;
    }

    public function build(): array
    {
        /** @var RepeaterSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $compiledSchema = [];

        foreach ($this->evaluate($schema->schema()) ?? [] as $child) {
            if ($child instanceof Schema) {
                $compiledSchema[] = $child->compile(
                    $this->registry,
                );
            }
        }

        $this->addIfNotNull(
            $data,
            'schema',
            $compiledSchema,
        );

        $this->addIfNotNull($data, 'defaultItems', $this->evaluate($schema->defaultItems()));
        $this->addIfNotNull($data, 'minItems', $this->evaluate($schema->minItems()));
        $this->addIfNotNull($data, 'maxItems', $this->evaluate($schema->maxItems()));
        $this->addIfNotNull($data, 'itemLabel', $this->evaluate($schema->itemLabel()));
        $this->addIfNotNull($data, 'layout', $this->evaluateEnum($schema->layout()));
        $this->addIfNotNull($data, 'cloneable', $this->evaluate($schema->isCloneable()));
        $this->addIfNotNull($data, 'collapsible', $this->evaluate($schema->isCollapsible()));
        $this->addIfNotNull($data, 'reorderable', $this->evaluate($schema->isReorderable()));

        $data['props'] = $schema->props();

        return $data;
    }
}
