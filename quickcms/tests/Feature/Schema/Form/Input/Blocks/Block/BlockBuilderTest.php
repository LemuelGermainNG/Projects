<?php

declare(strict_types=1);

use Tests\Support\Assertions\BlockAssertions;
use Tests\Support\Builders\BlockBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a block', function (): void {
    expect(
        BlockBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        BlockAssertions::make(),
    );
});
