<?php

declare(strict_types=1);

use App\Core\Schema\Form\Validation\Validation;
use App\Core\Schema\Form\Validation\ValidationBuilder;
use Tests\Support\Assertions\Validation\ValidationAssertions;
use Tests\Support\Builders\Validation\ValidationBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('returns validation schema', function (): void {
    expect(
        ValidationBuilder::schema(),
    )->toBe(
        Validation::class,
    );
});

it('builds validation', function (): void {
    expect(
        ValidationBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ValidationAssertions::make(),
    );
});
