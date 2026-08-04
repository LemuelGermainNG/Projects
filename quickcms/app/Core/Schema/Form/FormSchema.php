<?php

declare(strict_types=1);

namespace App\Core\Schema\Form;

use App\Core\Schema\Schema;
use App\Core\Source\Concerns\HasSource;
use App\Core\Support\Concerns\HasFooterActions;
use App\Core\Support\Concerns\HasHeaderActions;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasSchema;

final class FormSchema extends Schema
{
    use HasFooterActions;
    use HasHeaderActions;
    use HasProps;
    use HasSchema;
    use HasSource;
}
