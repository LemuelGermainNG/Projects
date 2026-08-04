<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Schema\Form\Base\BaseInputSchema;
use App\Core\Support\Concerns\HasClearable;
use App\Core\Support\Concerns\HasLoadingMessage;
use App\Core\Support\Concerns\HasMultiple;
use App\Core\Support\Concerns\HasNative;
use App\Core\Support\Concerns\HasNoResultsMessage;
use App\Core\Support\Concerns\HasOptions;
use App\Core\Support\Concerns\HasRelationship;
use App\Core\Support\Concerns\HasSearchable;

abstract class SelectInputBaseSchema extends BaseInputSchema
{
    use HasOptions;
    use HasMultiple;
    use HasSearchable;

    use HasNative;
    use HasClearable;

    use HasLoadingMessage;
    use HasNoResultsMessage;

    use HasRelationship;
}
