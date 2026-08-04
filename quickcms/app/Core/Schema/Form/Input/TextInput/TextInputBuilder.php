<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\TextInput;

use App\Core\Schema\Form\BaseInputBuilder;

final class TextInputBuilder extends BaseInputBuilder
{
    public static function schema(): string
    {
        return TextInputSchema::class;
    }

    protected function type(): string
    {
        return 'text-input';
    }
}
