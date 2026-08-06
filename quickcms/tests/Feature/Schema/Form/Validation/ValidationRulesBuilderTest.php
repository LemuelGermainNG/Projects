<?php

declare(strict_types=1);

use Tests\Support\Assertions\ValidationRulesAssertions;
use Tests\Support\Builders\ValidationRulesBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles validation rules', function (): void {
    expect(
        ValidationRulesBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        ValidationRulesAssertions::make(),
    );
});
