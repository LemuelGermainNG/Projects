<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Support\Concerns\HasLength;
use App\Core\Support\Concerns\HasMask;
use App\Core\Support\Concerns\HasMaxLength;
use App\Core\Support\Concerns\HasMinLength;
use App\Core\Support\Concerns\HasName;

abstract class TextInputBaseSchema extends BaseInputSchema
{
    use HasLength;
    use HasMask;
    use HasMaxLength;
    use HasMinLength;
    use HasName;
}
