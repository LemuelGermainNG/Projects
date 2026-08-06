<?php

declare(strict_types=1);

namespace App\Core\Schema\Table;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasSource;
use App\Core\Support\Concerns\HasBulkActions;
use App\Core\Support\Concerns\HasFilters;
use App\Core\Support\Concerns\HasHeaderActions;
use App\Core\Support\Concerns\HasPagination;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasRowActions;
use App\Core\Support\Concerns\HasSchema;

final class TableSchema extends Schema
{
    use HasBulkActions;
    use HasFilters;
    use HasHeaderActions;
    use HasPagination;
    use HasProps;
    use HasRowActions;
    use HasSchema;
    use HasSource;
}
