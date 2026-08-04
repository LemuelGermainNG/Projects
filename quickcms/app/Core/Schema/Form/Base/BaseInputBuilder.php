<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Builder\Builder;

abstract class BaseInputBuilder extends Builder
{
    abstract protected function type(): string;

    public function build(): array
    {
        /** @var BaseInputSchema $schema */
        $schema = $this->schema;

        $data = [
            'type' => $this->type(),

            'value' => $this->evaluate(
                $schema->value(),
            ),

            'placeholder' => $this->evaluate(
                $schema->placeholder(),
            ),

            'disabled' => $this->evaluate(
                $schema->disabled(),
            ),

            'readonly' => $this->evaluate(
                $schema->readonly(),
            ),

            'props' => $schema->props(),
        ];

        $this->addIfNotNull(
            $data,
            'prefix',
            $this->compileChild(
                $schema->prefix(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'suffix',
            $this->compileChild(
                $schema->suffix(),
            ),
        );

        return $data;
    }
}
