<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Badge;

use App\Core\Builder\Builder;

final class BadgeBuilder extends Builder
{
    public static function schema(): string
    {
        return BadgeSchema::class;
    }

    public function build(): array
    {
        /** @var BadgeSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'value' => $this->evaluate($schema->value()),

            'color' => $this->evaluate($schema->color()),

            'icon' => $this->evaluate($schema->icon()),

            'props' => $schema->props(),
        ];
    }
}
