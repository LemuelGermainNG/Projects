<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\CheckboxList;

use App\Core\Schema\Form\Base\SelectInputBaseBuilder;

final class CheckboxListBuilder extends SelectInputBaseBuilder
{
    public static function schema(): string
    {
        return CheckboxListSchema::class;
    }

    public function build(): array
    {
        /** @var CheckboxListSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'columns',
            $this->evaluate(
                $schema->columns(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'direction',
            $this->evaluateEnum(
                $schema->direction(),
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
