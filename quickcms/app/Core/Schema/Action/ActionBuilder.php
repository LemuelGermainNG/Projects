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
            'id' => $schema->id(),
            'name' => $schema->name(),
            'label' => $schema->label(),
            'icon' => $schema->icon(),
            'tooltip' => $schema->tooltip(),

            'visible' => $schema->visible(),
            'disabled' => $schema->disabled(),

            'type' => $schema->type()->value,
            'trigger' => $schema->trigger()->value,

            'color' => $schema->color()->value,
            'size' => $schema->size()->value,
            'target' => $schema->target()->value,

            'url' => $schema->url(),

            'attributes' => $schema->attributes(),

            'event' => $schema->event(),

            'modal' => $schema->modal() !== null
                ? $this->registry->build($schema->modal())
                : null,

            'confirmation' => $schema->confirmation() !== null
                ? $this->registry->build($schema->confirmation())
                : null,
        ];
    }
}
