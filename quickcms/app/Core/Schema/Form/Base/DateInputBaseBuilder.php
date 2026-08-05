<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

abstract class DateInputBaseBuilder extends BaseInputBuilder
{
    public function build(): array
    {
        /** @var DateInputBaseSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'format',
            $this->evaluate(
                $schema->format(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'displayFormat',
            $this->evaluate(
                $schema->displayFormat(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'timezone',
            $this->evaluate(
                $schema->timezone(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'minDate',
            $this->evaluate(
                $schema->minDate(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'maxDate',
            $this->evaluate(
                $schema->maxDate(),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
