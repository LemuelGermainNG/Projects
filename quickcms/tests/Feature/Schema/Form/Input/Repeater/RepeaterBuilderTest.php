<?php

declare(strict_types=1);

use Tests\Support\Assertions\RepeaterAssertions;
use Tests\Support\Builders\RepeaterBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a repeater', function (): void {
    expect(
        RepeaterBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        RepeaterAssertions::make(),
    );
});
