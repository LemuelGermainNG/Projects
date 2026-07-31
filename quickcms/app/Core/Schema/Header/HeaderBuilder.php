<?php

declare(strict_types=1);

namespace App\Core\Schema\Header;

use App\Core\Builder\Builder;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Support\Contracts\IconInterface;

final class HeaderBuilder extends Builder
{
    public static function schema(): string
    {
        return HeaderSchema::class;
    }

    public function build(): array
    {
        /** @var HeaderSchema $schema */
        $schema = $this->schema;

        $icon = $this->evaluate($schema->icon());

        if ($icon instanceof IconInterface) {
            $icon = $icon->value();
        }

        return [
            'type' => 'header',
            'title' => $schema->title(),
            'description' => $schema->description(),
            'icon' => $icon,
            'props' => $schema->props(),
        ];
    }
}
