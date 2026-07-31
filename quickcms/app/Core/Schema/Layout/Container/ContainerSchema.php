<?php

declare(strict_types=1);

namespace App\Core\Schema\Container;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasChildren;
use App\Core\Support\Concerns\HasProps;

final class ContainerSchema extends Schema
{
    use HasChildren;
    use HasProps;
}
