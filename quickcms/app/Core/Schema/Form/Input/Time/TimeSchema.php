<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Time;

use App\Core\Schema\Form\Base\DateInputBaseSchema;
use App\Core\Support\Concerns\Date\HasHoursStep;
use App\Core\Support\Concerns\Date\HasMinutesStep;
use App\Core\Support\Concerns\Date\HasSeconds;
use App\Core\Support\Concerns\Date\HasSecondsStep;
use App\Core\Support\Concerns\Date\HasTwentyFourHours;

final class TimeSchema extends DateInputBaseSchema
{
    use HasHoursStep;
    use HasMinutesStep;
    use HasSeconds;
    use HasSecondsStep;
    use HasTwentyFourHours;
}
