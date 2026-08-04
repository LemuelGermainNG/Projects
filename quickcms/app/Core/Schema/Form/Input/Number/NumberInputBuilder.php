<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Number;

use App\Core\Schema\Form\Base\NumberInputBaseBuilder;

final class NumberInputBuilder extends NumberInputBaseBuilder
{
    public static function schema(): string
    {
        return NumberInputSchema::class;
    }
}
