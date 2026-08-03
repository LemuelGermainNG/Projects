<?php

declare(strict_types=1);

namespace Tests\Fixtures\Sources;

use Spatie\LaravelData\Data;

final class UserData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
    ) {}
}
