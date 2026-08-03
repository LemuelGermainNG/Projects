<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Text;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasColor;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasValue;

final class TextSchema extends Schema
{
    use HasColor;
    use HasProps;
    use HasValue;
}
