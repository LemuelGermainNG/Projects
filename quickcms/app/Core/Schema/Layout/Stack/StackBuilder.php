<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Stack;

use App\Core\Builder\Layout\ChildrenLayoutBuilder;

final class StackBuilder extends ChildrenLayoutBuilder
{
    public static function schema(): string
    {
        return StackSchema::class;
    }

    public function build(): array
    {
        /** @var StackSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'gap' => $schema->gap(),

            'children' => $this->buildChildren($schema->children()),

            'props' => $schema->props(),
        ];
    }
}
