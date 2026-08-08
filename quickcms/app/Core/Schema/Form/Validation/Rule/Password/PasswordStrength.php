<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Password;

enum PasswordStrength: string
{
    case Weak = 'weak';

    case Medium = 'medium';

    case Strong = 'strong';

    case VeryStrong = 'very-strong';
}
