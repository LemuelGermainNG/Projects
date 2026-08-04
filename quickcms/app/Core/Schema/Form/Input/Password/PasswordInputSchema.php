<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Password;

use App\Core\Schema\Form\Base\TextInputBaseSchema;
use App\Core\Support\Concerns\HasRevealable;

final class PasswordInputSchema extends TextInputBaseSchema
{
    use HasRevealable;
}
