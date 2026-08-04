<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Flex;

use App\Core\Builder\Layout\ChildrenLayoutBuilder;

final class FlexBuilder extends ChildrenLayoutBuilder
{
    public static function schema(): string
    {
        return FlexSchema::class;
    }

    public function build(): array
    {
        /** @var FlexSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'direction' => $this->evaluate(
                $schema->direction(),
            ),

            'justify' => $this->evaluate(
                $schema->justify(),
            ),

            'align' => $this->evaluate(
                $schema->align(),
            ),

            'wrap' => $this->evaluate(
                $schema->wrap(),
            ),

            'gap' => $schema->gap(),

            'children' => $this->buildChildren($schema->children()),

            'props' => $schema->props(),
        ];
    }
}
