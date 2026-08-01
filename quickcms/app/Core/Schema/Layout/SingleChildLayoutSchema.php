<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasChild;
use App\Core\Support\Concerns\HasHeader;
use App\Core\Support\Concerns\HasProps;

abstract class SingleChildLayoutSchema extends Schema
{
    use HasHeader;
    use HasChild;
    use HasProps;
}
