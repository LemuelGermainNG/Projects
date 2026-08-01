<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Grid;

use App\Core\Schema\Layout\LayoutSchema;
use App\Core\Support\Concerns\HasColumns;
use App\Core\Support\Concerns\HasGap;

final class GridSchema extends LayoutSchema
{
    use HasColumns;
    use HasGap;
}
