<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Grid;

use App\Core\Builder\Builder;

final class GridItemBuilder extends Builder
{
    public const TYPE = 'grid-item';

    public static function schema(): string
    {
        return GridItemSchema::class;
    }

    public function build(): array
    {
        /** @var GridItemSchema $schema */
        $schema = $this->schema;

        return [
            'type' => self::TYPE,

            'span' => $schema->span(),

            'spanSm' => $schema->spanSm(),

            'spanMd' => $schema->spanMd(),

            'spanLg' => $schema->spanLg(),

            'spanXl' => $schema->spanXl(),

            'offset' => $schema->offset(),

            'order' => $schema->order(),

            'align' => $this->evaluate($schema->align()),

            'justify' => $this->evaluate($schema->justify()),

            'child' => $schema->child() !== null ? $this->registry->build($schema->child(), $this->context) : null,

            'props' => $schema->props(),
        ];
    }
}
