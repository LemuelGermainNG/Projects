<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Grid;

use App\Core\Builder\Layout\ChildrenLayoutBuilder;

final class GridBuilder extends ChildrenLayoutBuilder
{
    public const TYPE = 'grid';

    public static function schema(): string
    {
        return GridSchema::class;
    }

    public function build(): array
    {
        /** @var GridSchema $schema */
        $schema = $this->schema;

        return [
            'type' => self::TYPE,

            'columns' => $schema->columns(),

            'gap' => $schema->gap(),

            'children' => $this->buildChildren(
                $schema->children(),
            ),

            'props' => $schema->props(),
        ];
    }
}
