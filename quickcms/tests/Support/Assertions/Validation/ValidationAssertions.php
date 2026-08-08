<?php

declare(strict_types=1);

namespace Tests\Support\Assertions\Validation;

final class ValidationAssertions
{
    public static function make(): array
    {
        return [
            'rules' => [
                ...PresenceAssertions::required(),
                ...TypeAssertions::string(),
                ...SizeAssertions::min(),
                ...SizeAssertions::max(),
                ...TextAssertions::email(),
            ],
        ];
    }
}
