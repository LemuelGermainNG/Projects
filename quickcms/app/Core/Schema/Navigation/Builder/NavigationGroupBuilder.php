<?php

namespace App\Core\Schema\Navigation\Builder;

use App\Core\Builder\Builder;
use App\Core\Schema\Navigation\NavigationGroupSchema;

final class NavigationGroupBuilder extends Builder
{
    public static function schema(): string
    {
        return NavigationGroupSchema::class;
    }

    public function build(): array
    {
        /** @var NavigationGroupSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),
            'label' => $schema->label(),
            'icon' => $schema->icon(),
            'items' => $this->compileSchemas(
                $schema->items(),
            ),
            'props' => $schema->props(),
        ];
    }
}
