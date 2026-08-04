<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Textarea;

use App\Core\Schema\Form\Base\TextInputBaseSchema;
use App\Core\Support\Concerns\HasAutosize;
use App\Core\Support\Concerns\HasCols;
use App\Core\Support\Concerns\HasRows;

final class TextareaInputSchema extends TextInputBaseSchema
{
    use HasAutosize;
    use HasCols;
    use HasRows;
}
