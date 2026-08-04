<?php

declare(strict_types=1);

namespace App\Core\Schema\Form;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasDisabled;
use App\Core\Support\Concerns\HasPlaceholder;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasReadonly;
use App\Core\Support\Concerns\HasValue;

abstract class BaseInputSchema extends Schema
{
    use HasDisabled;
    use HasPlaceholder;
    use HasProps;
    use HasReadonly;
    use HasValue;
}
