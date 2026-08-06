<?php

declare(strict_types=1);

use Tests\Support\Assertions\HiddenAssertions;
use Tests\Support\Builders\HiddenBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a hidden input', function (): void {
    expect(
        HiddenBuilderFactory::make()->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray(
        HiddenAssertions::make(),
    );
});
