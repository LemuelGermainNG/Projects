<?php

namespace App\Core\Schema\Form\Input\EmailInput;

use App\Core\Schema\Form\BaseInputBuilder;

final class EmailInputBuilder extends BaseInputBuilder
{
    public static function schema(): string
    {
        return EmailInputSchema::class;
    }

    protected function type(): string
    {
        return 'email-input';
    }
}
