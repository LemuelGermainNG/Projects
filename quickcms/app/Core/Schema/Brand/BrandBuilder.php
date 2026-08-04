<?php

declare(strict_types=1);

namespace App\Core\Schema\Brand;

use App\Core\Builder\Builder;

final class BrandBuilder extends Builder
{
    public static function schema(): string
    {
        return BrandSchema::class;
    }

    public function build(): array
    {
        return [
            'type' => $this->type(),
            ...$this->schema->values(),
        ];
    }
}
