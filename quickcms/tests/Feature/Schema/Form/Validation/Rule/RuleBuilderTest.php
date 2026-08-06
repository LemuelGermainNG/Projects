<?php

declare(strict_types=1);

use Tests\Support\Assertions\RuleAssertions;
use Tests\Support\Builders\RuleBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a rule', function (): void {
    expect(
        RuleBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        RuleAssertions::make(),
    );
});
