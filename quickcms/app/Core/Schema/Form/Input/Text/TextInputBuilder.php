<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Text;

use App\Core\Schema\Form\Base\TextInputBaseBuilder;

final class TextInputBuilder extends TextInputBaseBuilder
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
