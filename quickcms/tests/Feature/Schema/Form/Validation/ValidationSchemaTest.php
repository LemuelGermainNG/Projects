<?php

declare(strict_types=1);

use App\Core\Schema\Form\Validation\Validation;
use Tests\Support\Builders\ValidationBuilderFactory;

it('creates validation rules', function (): void {
    expect(
        ValidationBuilderFactory::make(),
    )->toBeInstanceOf(
        Validation::class,
    );
});

it('sets rules', function (): void {
    expect(
        ValidationBuilderFactory::make()
            ->rules(),
    )->toHaveCount(3);
});
