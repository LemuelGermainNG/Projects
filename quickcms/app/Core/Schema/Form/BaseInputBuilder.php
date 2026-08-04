<?php

namespace App\Core\Schema\Form;

use App\Core\Builder\Builder;

abstract class BaseInputBuilder extends Builder
{
    abstract protected function type(): string;

    public function build(): array
    {
        /** @var BaseInputSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'value' => $this->evaluate($schema->value()),
            'placeholder' => $this->evaluate($schema->placeholder()),
            'disabled' => $this->evaluate($schema->disabled()),
            'readonly' => $this->evaluate($schema->readonly()),
            'props' => $schema->props(),
        ];
    }
}
