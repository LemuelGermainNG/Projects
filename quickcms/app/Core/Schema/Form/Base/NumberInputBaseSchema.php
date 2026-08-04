<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Support\Concerns\HasMax;
use App\Core\Support\Concerns\HasMin;
use App\Core\Support\Concerns\HasStep;

abstract class NumberInputBaseSchema extends BaseInputSchema
{
    use HasMax;
    use HasMin;
    use HasStep;
}
