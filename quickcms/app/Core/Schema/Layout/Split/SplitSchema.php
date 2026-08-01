<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Split;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasDirection;
use App\Core\Support\Concerns\HasEnd;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasRatio;
use App\Core\Support\Concerns\HasStart;

final class SplitSchema extends Schema
{
    use HasDirection;

    use HasStart;

    use HasEnd;

    use HasRatio;

    use HasProps;
}
