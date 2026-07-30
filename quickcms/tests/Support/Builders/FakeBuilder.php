<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Builder\Builder;
use Tests\Support\Schemas\FakeSchema;

final class FakeBuilder extends Builder
{
    public static function schema(): string
    {
        return FakeSchema::class;
    }

    public function build(): array
    {
        return [
            'builder' => self::class,
            'schema' => $this->schema::class,
        ];
    }
}
