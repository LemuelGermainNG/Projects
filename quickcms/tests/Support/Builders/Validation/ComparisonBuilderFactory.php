<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class ComparisonBuilderFactory
{
    public static function make(): Validation
    {
        return Validation::make()
            ->same('password_confirmation')
            ->different('old_password')
            ->in([
                'draft',
                'published',
                'archived',
            ])
            ->notIn([
                'deleted',
            ]);
    }
}
