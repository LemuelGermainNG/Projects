<?php

declare(strict_types=1);

namespace App\Core\Schema\Table\Column;

use App\Core\Schema\SingleElementSchema;
use App\Core\Support\Concerns\HasAlign;
use App\Core\Support\Concerns\HasDefault;
use App\Core\Support\Concerns\HasFormatter;
use App\Core\Support\Concerns\HasHidden;
use App\Core\Support\Concerns\HasSearchable;
use App\Core\Support\Concerns\HasSortable;
use App\Core\Support\Concerns\HasToggleable;
use App\Core\Support\Concerns\HasWidth;

final class ColumnSchema extends SingleElementSchema
{
    use HasAlign;
    use HasDefault;
    use HasFormatter;
    use HasHidden;
    use HasSearchable;
    use HasSortable;
    use HasToggleable;
    use HasWidth;
}
