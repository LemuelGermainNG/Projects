<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule;

enum RuleType: string
{
    case Required = 'required';

    case Nullable = 'nullable';

    case Email = 'email';

    case Min = 'min';

    case Max = 'max';

    case Integer = 'integer';

    case Numeric = 'numeric';

    case Boolean = 'boolean';

    case Confirmed = 'confirmed';

    case Unique = 'unique';

    case Exists = 'exists';
}
