<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class DateBuilderFactory
{
    public static function make(): Validation
    {
        return Validation::make()
            ->date()
            ->after('today')
            ->before('2030-12-31');
    }
}
