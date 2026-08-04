<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Textarea;

use App\Core\Schema\Form\Base\TextInputBaseBuilder;

final class TextareaInputBuilder extends TextInputBaseBuilder
{
    public static function schema(): string
    {
        return TextareaInputSchema::class;
    }

    public function build(): array
    {
        /** @var TextareaInputSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'rows',
            $this->evaluate($schema->rows()),
        );

        $this->addIfNotNull(
            $data,
            'cols',
            $this->evaluate($schema->cols()),
        );

        $this->addIfNotNull(
            $data,
            'autosize',
            $this->evaluate($schema->autosize()),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
