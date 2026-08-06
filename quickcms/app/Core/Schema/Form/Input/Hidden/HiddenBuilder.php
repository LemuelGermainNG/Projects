<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Hidden;

use App\Core\Schema\Form\Base\BaseInputBuilder;

final class HiddenBuilder extends BaseInputBuilder
{
    public static function schema(): string
    {
        return HiddenSchema::class;
    }
}
