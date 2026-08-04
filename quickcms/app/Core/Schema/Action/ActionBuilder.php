<?php

declare(strict_types=1);

namespace App\Core\Schema\Action;

use App\Core\Builder\Builder;

final class ActionBuilder extends Builder
{
    /**
     * Returns the schema handled by this builder.
     */
    public static function schema(): string
    {
        return ActionSchema::class;
    }

    /**
     * Compile the action.
     */
    public function build(): array
    {
        /** @var ActionSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'label' => $this->evaluate($schema->label()),

            'icon' => $this->evaluate($schema->icon()),

            'color' => $this->evaluate($schema->color()),

            'modal' => $schema->modal() !== null
                ? $this->registry->build(
                    $schema->modal(),
                    $this->context,
                )
                : null,

            'confirmation' => $schema->confirmation() !== null
                ? $this->registry->build(
                    $schema->confirmation(),
                    $this->context,
                )
                : null,
        ];
    }
}
