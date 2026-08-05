<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Checkbox;

use App\Core\Schema\Form\Base\BooleanInputBaseBuilder;

final class CheckboxBuilder extends BooleanInputBaseBuilder
{
    public static function schema(): string
    {
        return CheckboxSchema::class;
    }
}
