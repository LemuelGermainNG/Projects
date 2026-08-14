<?php

declare(strict_types=1);

namespace App\Core\Schema\Navigation\Builder;

use App\Core\Builder\Builder;
use App\Core\Schema\Navigation\NavigationGroupSchema;
use App\Core\Schema\Navigation\NavigationItemSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use LogicException;

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
            'items' => array_map(
                function (NavigationItemSchema|NavigationGroupSchema $item): array {
                    return $this->registry->build(
                        $item,
                        $this->context,
                    );
                },
                $schema->items(),
            ),
            'props' => $schema->props(),
        ];
    }
}
