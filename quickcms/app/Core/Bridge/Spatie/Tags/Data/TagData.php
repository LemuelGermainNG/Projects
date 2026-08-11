<?php

declare(strict_types=1);

namespace App\Core\Bridge\Spatie\Tags\Data;

use Spatie\LaravelData\Data;

final class TagData extends Data
{
    public function __construct(
        public int $id,
        public mixed $name,
        public mixed $slug,
        public ?string $type = null,
        public ?int $order_column = null,
    ) {
    }
}
