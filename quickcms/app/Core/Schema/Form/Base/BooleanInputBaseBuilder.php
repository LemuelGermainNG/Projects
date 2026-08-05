<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

abstract class BooleanInputBaseBuilder extends BaseInputBuilder
{
    public function build(): array
    {
        /** @var BooleanInputBaseSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'checked',
            $this->evaluate(
                $schema->isChecked(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'inline',
            $this->evaluate(
                $schema->isInline(),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
