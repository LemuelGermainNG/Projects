<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Tabs;

use App\Core\Builder\Builder;

final class TabBuilder extends Builder
{
    public const TYPE = 'tab';

    public static function schema(): string
    {
        return TabSchema::class;
    }

    public function build(): array
    {
        /** @var TabSchema $schema */
        $schema = $this->schema;

        return [
            'type' => self::TYPE,

            'label' => $this->evaluate(
                $schema->label(),
            ),

            'icon' => $this->evaluate(
                $schema->icon(),
            ),

            'visible' => $this->evaluate(
                $schema->visible(),
            ),

            'disabled' => $this->evaluate(
                $schema->disabled(),
            ),

            'child' => $schema->child() !== null
                ? $this->registry->build(
                    $schema->child(),
                    $this->context,
                )
                : null,

            'props' => $schema->props(),
        ];
    }
}
