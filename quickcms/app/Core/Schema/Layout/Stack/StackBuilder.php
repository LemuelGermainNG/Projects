<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Stack;

use App\Core\Builder\Builder;

final class StackBuilder extends Builder
{
    public const TYPE = 'stack';

    public static function schema(): string
    {
        return StackSchema::class;
    }

    public function build(): array
    {
        /** @var StackSchema $schema */
        $schema = $this->schema;

        return [
            'type' => self::TYPE,

            'gap' => $schema->gap(),

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
