<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Stat;

use App\Core\Builder\Builder;

final class StatBuilder extends Builder
{
    public static function schema(): string
    {
        return StatSchema::class;
    }

    public function build(): array
    {
        /** @var StatSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'stat',

            'label' => $this->evaluate($schema->label()),

            'value' => $this->evaluate($schema->value()),

            'icon' => $this->evaluate($schema->icon()),

            'color' => $this->evaluate($schema->color()),

            'props' => $schema->props(),
        ];
    }
}
