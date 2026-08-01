<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Tabs;

use App\Core\Builder\Layout\ChildrenLayoutBuilder;

final class TabsBuilder extends ChildrenLayoutBuilder
{
    public const TYPE = 'tabs';

    public static function schema(): string
    {
        return TabsSchema::class;
    }

    public function build(): array
    {
        /** @var TabsSchema $schema */
        $schema = $this->schema;

        return [
            'type' => self::TYPE,

            'children' => $this->buildChildren(
                $schema->tabs(),
            ),

            'props' => $schema->props(),
        ];
    }
}
