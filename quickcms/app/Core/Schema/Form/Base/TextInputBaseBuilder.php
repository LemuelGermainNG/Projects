<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

abstract class TextInputBaseBuilder extends BaseInputBuilder
{
    public function build(): array
    {
        /** @var TextInputBaseSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        $this->addIfNotNull(
            $data,
            'mask',
            $this->evaluate(
                $schema->mask(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'length',
            $this->evaluate(
                $schema->length(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'minLength',
            $this->evaluate(
                $schema->minLength(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'maxLength',
            $this->evaluate(
                $schema->maxLength(),
            ),
        );

        return $data;
    }
}
