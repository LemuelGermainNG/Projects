<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Icon;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasColor;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasProps;

final class IconSchema extends Schema
{
    use HasColor;
    use HasIcon;
    use HasProps;
}
