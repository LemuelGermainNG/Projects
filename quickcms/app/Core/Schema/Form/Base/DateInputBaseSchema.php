<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

use App\Core\Support\Concerns\Date\HasDisplayFormat;
use App\Core\Support\Concerns\Date\HasFormat;
use App\Core\Support\Concerns\Date\HasMaxDate;
use App\Core\Support\Concerns\Date\HasMinDate;
use App\Core\Support\Concerns\Date\HasTimezone;

abstract class DateInputBaseSchema extends BaseInputSchema
{
    use HasDisplayFormat;
    use HasFormat;
    use HasMaxDate;
    use HasMinDate;
    use HasTimezone;
}
