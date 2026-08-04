<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Phone;

use App\Core\Schema\Form\Base\TextInputBaseBuilder;

final class PhoneInputBuilder extends TextInputBaseBuilder
{
    public static function schema(): string
    {
        return PhoneInputSchema::class;
    }
}
