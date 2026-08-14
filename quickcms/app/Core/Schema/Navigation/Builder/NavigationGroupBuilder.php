<?php

declare(strict_types=1);

namespace App\Core\Schema\Navigation\Builder;

use App\Core\Builder\Builder;
use App\Core\Schema\Navigation\NavigationGroupSchema;
use App\Core\Schema\Navigation\NavigationItemSchema;

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
            'type' => 'navigation-group',
            'label' => $schema->label(),
            'icon' => $schema->icon(),
            'items' => array_map(
                fn (NavigationItemSchema $item): array => $this->registry->build(
                    $item,
                    $this->context,
                ),
                $schema->items(),
            ),
            'props' => $schema->props(),
        ];
    }
}
