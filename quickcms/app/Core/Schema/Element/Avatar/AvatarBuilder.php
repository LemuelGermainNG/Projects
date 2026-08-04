<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Avatar;

use App\Core\Builder\Builder;

final class AvatarBuilder extends Builder
{
    public static function schema(): string
    {
        return AvatarSchema::class;
    }

    public function build(): array
    {
        /** @var AvatarSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'name' => $this->evaluate($schema->name()),

            'url' => $this->evaluate($schema->url()),

            'alt' => $this->evaluate($schema->alt()),

            'props' => $schema->props(),
        ];
    }
}
