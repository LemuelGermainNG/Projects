<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasChildren;
use App\Core\Support\Concerns\HasProps;

abstract class LayoutSchema extends Schema
{
    use HasChildren;
    use HasProps;
}
