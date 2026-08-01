<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Grid;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasAlign;
use App\Core\Support\Concerns\HasChild;
use App\Core\Support\Concerns\HasJustify;
use App\Core\Support\Concerns\HasOffset;
use App\Core\Support\Concerns\HasOrder;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasSpan;
use App\Core\Support\Concerns\HasSpanLg;
use App\Core\Support\Concerns\HasSpanMd;
use App\Core\Support\Concerns\HasSpanSm;
use App\Core\Support\Concerns\HasSpanXl;

final class GridItemSchema extends Schema
{
    use HasChild;
    use HasProps;
    use HasSpan;
    use HasSpanSm;
    use HasSpanMd;
    use HasSpanLg;
    use HasSpanXl;
    use HasOffset;
    use HasOrder;
    use HasAlign;
    use HasJustify;
}
