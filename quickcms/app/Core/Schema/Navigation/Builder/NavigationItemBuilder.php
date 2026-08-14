<?php

declare(strict_types=1);

namespace App\Core\Schema\Navigation\Builder;

use App\Core\Builder\Builder;
use App\Core\Schema\Navigation\NavigationItemSchema;

final class NavigationItemBuilder extends Builder
{
    public static function schema(): string
    {
        return NavigationItemSchema::class;
    }

    public function build(): array
    {
        /** @var NavigationItemSchema $schema */
        $schema = $this->schema;

        return [
            'label' => $schema->label(),
            'icon' => $schema->icon(),
            'route' => $schema->route(),
            'url' => $schema->url(),
            'badge' => $schema->badge(),
            'visible' => $schema->visible(),
            'children' => array_map(
                fn (NavigationItemSchema $child): array => $this->registry->build(
                    $child,
                    $this->context,
                ),
                $schema->children(),
            ),
            'props' => $schema->props(),
        ];
    }
}
