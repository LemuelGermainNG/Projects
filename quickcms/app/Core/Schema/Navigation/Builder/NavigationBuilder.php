<?php

declare(strict_types=1);

namespace App\Core\Schema\Navigation\Builder;

use App\Core\Builder\Builder;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;

final class NavigationBuilder extends Builder
{
    public static function schema(): string
    {
        return NavigationSchema::class;
    }

    public function build(): array
    {
        /** @var NavigationSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),
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
