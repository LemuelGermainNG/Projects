<?php

declare(strict_types=1);

namespace Tests\Support\Assertions;

use Tests\Support\Assertions\Validation\ValidationAssertions as BaseValidationAssertions;

final class ValidationAssertions
{
    public static function make(): array
    {
        return BaseValidationAssertions::make();
    }

    public static function email(): array
    {
        return [
            'rules' => [
                [
                    'type' => 'required',
                ],
                [
                    'type' => 'string',
                ],
                [
                    'type' => 'email',
                ],
            ],
        ];
    }
}
