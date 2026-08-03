<?php

declare(strict_types=1);

namespace App\Core\Schema;

use App\Core\Support\Concerns\HasChild;
use App\Core\Support\Concerns\HasDescription;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasProps;

abstract class SingleElementSchema extends Schema
{
    use HasChild;
    use HasDescription;
    use HasLabel;
    use HasProps;
}
