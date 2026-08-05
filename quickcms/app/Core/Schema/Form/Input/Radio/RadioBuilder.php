<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Radio;

use App\Core\Schema\Form\Base\SelectInputBaseBuilder;

final class RadioBuilder extends SelectInputBaseBuilder
{
    public static function schema(): string
    {
        return RadioSchema::class;
    }

    public function build(): array
    {
        /** @var RadioSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

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
