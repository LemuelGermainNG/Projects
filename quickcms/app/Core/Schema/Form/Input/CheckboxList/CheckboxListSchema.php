<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\CheckboxList;

use App\Core\Schema\Form\Base\SelectInputBaseSchema;
use App\Core\Support\Concerns\HasColumns;
use App\Core\Support\Concerns\HasDirection;
use App\Core\Support\Concerns\HasInline;

final class CheckboxListSchema extends SelectInputBaseSchema
{
    use HasColumns;
    use HasDirection;
    use HasInline;
}
