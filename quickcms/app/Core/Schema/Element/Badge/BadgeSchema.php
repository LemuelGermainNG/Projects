<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Badge;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasColor;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasValue;

final class BadgeSchema extends Schema
{
    use HasColor;
    use HasIcon;
    use HasProps;
    use HasValue;
}
