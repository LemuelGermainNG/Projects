<?php

declare(strict_types=1);

namespace Tests\Support\Builders;

use App\Core\Schema\Form\Validation\Rule\Rule;

final class RuleBuilderFactory
{
    public static function make(): Rule
    {
        return Rule::min(3)
            ->message('Minimum 3 caractères');
    }
}
