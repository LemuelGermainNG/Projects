<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Validation\Rule\Rule;
use App\Core\Schema\Form\Validation\ValidationRules;

final class ValidationRulesBuilderFactory
{
    public static function make(): ValidationRules
    {
        return ValidationRules::make()
            ->rules([
                Rule::required(),

                Rule::min(3),

                Rule::max(255),
            ]);
    }
}
