<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Radio;

use App\Core\Schema\Form\Base\SelectInputBaseSchema;
use App\Core\Support\Concerns\HasInline;

final class RadioSchema extends SelectInputBaseSchema
{
    use HasInline;
}
