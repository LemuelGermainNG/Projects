<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Support\Concerns\HasChecked;
use App\Core\Support\Concerns\HasInline;

abstract class BooleanInputBaseSchema extends BaseInputSchema
{
    use HasChecked;
    use HasInline;
}
