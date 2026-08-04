<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Field;

use App\Core\Schema\SingleElementSchema;
use App\Core\Support\Concerns\HasName;

final class FieldSchema extends SingleElementSchema
{
    use HasName;
}
