<?php

declare(strict_types=1);

namespace App\Core\Schema\Container;

use App\Core\Builder\Builder;
use App\Core\Schema\Container\ContainerSchema;

final class ContainerBuilder extends Builder
{
    public static function schema(): string
    {
        return ContainerSchema::class;
    }

    public function build(): array
    {
        /** @var ContainerSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'container',
            'children' => array_map(
                fn ($child) => $this->registry->build(
                    $child,
                    $this->context,
                ),
                $schema->children(),
            ),
            'props' => $schema->props(),
        ];
    }
}
