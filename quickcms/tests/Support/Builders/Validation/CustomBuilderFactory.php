<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Validation;

use App\Core\Schema\Form\Validation\Validation;

final class CustomBuilderFactory
{
    public static function make(): Validation
    {
        return Validation::make()
            ->custom(
                'slug_unique',
                [
                    'locale' => true,
                    'ignoreCurrent' => true,
                ],
            );
    }
}
