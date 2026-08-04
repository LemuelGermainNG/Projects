<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

abstract class NumberInputBaseBuilder extends BaseInputBuilder
{
    public function build(): array
    {
        /** @var NumberInputBaseSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'min',
            $this->evaluate($schema->min()),
        );

        $this->addIfNotNull(
            $data,
            'max',
            $this->evaluate($schema->max()),
        );

        $this->addIfNotNull(
            $data,
            'step',
            $this->evaluate($schema->step()),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
