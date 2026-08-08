<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Builder\Builder;

abstract class BaseInputBuilder extends Builder
{
    public function build(): array
    {
        /** @var BaseInputSchema $schema */
        $schema = $this->schema;

        $data = [
            'type' => $this->type(),

            'name' => $this->evaluate(
                    $schema->name(),
                ),
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
            'state',
            $this->compileState(
                $schema,
            ),
        );

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

        $this->addIfNotNull(
            $data,
            'validation',
            $this->compileChild(
                $schema->validation(),
            ),
        );

        return $data;
    }

    protected function compileState(
        BaseInputSchema $schema,
    ): ?array {
        $state = $schema->stateSchema();

        if ($state === null) {
            return null;
        }

        if ($state instanceof \Closure) {
            $state = $this->evaluate($state);
        }

        if ($state === null) {
            return null;
        }

        return $this->compileChild($state);
    }
}
