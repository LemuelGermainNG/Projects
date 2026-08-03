<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Icon;

use App\Core\Builder\Builder;

final class IconBuilder extends Builder
{
    public static function schema(): string
    {
        return IconSchema::class;
    }

    public function build(): array
    {
        /** @var IconSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'icon',

            'icon' => $this->evaluate($schema->icon()),

            'color' => $this->evaluate($schema->color()),

            'props' => $schema->props(),
        ];
    }
}
