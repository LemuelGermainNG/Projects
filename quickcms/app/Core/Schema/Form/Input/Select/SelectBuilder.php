<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Select;

use App\Core\Schema\Form\Base\SelectInputBaseBuilder;

final class SelectBuilder extends SelectInputBaseBuilder
{
    public static function schema(): string
    {
        return SelectSchema::class;
    }
}
