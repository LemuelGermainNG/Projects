<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Accordion;

use App\Core\Builder\Layout\ChildrenLayoutBuilder;

final class AccordionBuilder extends ChildrenLayoutBuilder
{
    public const TYPE = 'accordion';

    public static function schema(): string
    {
        return AccordionSchema::class;
    }

    public function build(): array
    {
        /** @var AccordionSchema $schema */
        $schema = $this->schema;

        return [
            'type' => self::TYPE,

            'children' => $this->buildChildren(
                $schema->items(),
            ),

            'props' => $schema->props(),
        ];
    }
}
