<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Text;

use App\Core\Builder\Builder;

final class TextBuilder extends Builder
{
    public static function schema(): string
    {
        return TextSchema::class;
    }

    public function build(): array
    {
        /** @var TextSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'value' => $this->evaluate($schema->value(),),

            'color' => $this->evaluate($schema->color(),),

            'props' => $schema->props(),
        ];
    }
}
