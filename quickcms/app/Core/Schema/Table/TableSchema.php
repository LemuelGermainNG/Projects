<?php

declare(strict_types=1);

namespace App\Core\Schema\Table;

use App\Core\Schema\Schema;
use App\Core\Source\Concerns\HasSource;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasSchema;

final class TableSchema extends Schema
{
    use HasProps;
    use HasSchema;
    use HasSource;
}
