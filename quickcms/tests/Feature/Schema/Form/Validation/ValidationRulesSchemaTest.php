<?php

declare(strict_types=1);

use App\Core\Schema\Form\Validation\ValidationRules;
use Tests\Support\Builders\ValidationRulesBuilderFactory;

it('creates validation rules', function (): void {
    expect(
        ValidationRulesBuilderFactory::make(),
    )->toBeInstanceOf(
        ValidationRules::class,
    );
});

it('sets rules', function (): void {
    expect(
        ValidationRulesBuilderFactory::make()
            ->rules(),
    )->toHaveCount(3);
});
