<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasDisabled;
use App\Core\Support\Concerns\HasName;
use App\Core\Support\Concerns\HasPlaceholder;
use App\Core\Support\Concerns\HasPrefix;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasReadonly;
use App\Core\Support\Concerns\HasState;
use App\Core\Support\Concerns\HasSuffix;
use App\Core\Support\Concerns\HasValidation;
use App\Core\Support\Concerns\HasValue;

abstract class BaseInputSchema extends Schema
{
    use HasDisabled;
    use HasName;
    use HasPlaceholder;
    use HasPrefix;
    use HasProps;
    use HasReadonly;
    use HasState;
    use HasSuffix;
    use HasValue;
    use HasValidation;
}
