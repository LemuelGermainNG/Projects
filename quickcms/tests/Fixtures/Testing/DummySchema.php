<?php

declare(strict_types=1);

namespace Tests\Fixtures\Testing;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasSource;

final class DummySchema extends Schema
{
    use HasSource;
}
