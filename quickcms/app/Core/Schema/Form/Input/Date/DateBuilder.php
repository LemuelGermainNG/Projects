<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Date;

use App\Core\Schema\Form\Base\DateInputBaseBuilder;

final class DateBuilder extends DateInputBaseBuilder
{
    public static function schema(): string
    {
        return DateSchema::class;
    }
}
