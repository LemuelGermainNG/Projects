<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Email;

use App\Core\Schema\Form\Base\TextInputBaseBuilder;

final class EmailInputBuilder extends TextInputBaseBuilder
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
