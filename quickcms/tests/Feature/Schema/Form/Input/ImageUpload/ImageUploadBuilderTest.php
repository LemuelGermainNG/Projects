<?php

declare(strict_types=1);

use Tests\Support\Assertions\FileAssertions;
use Tests\Support\Builders\FileBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an image upload', function (): void {
    expect(
        FileBuilderFactory::avatar()->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray(
        FileAssertions::avatar(),
    );
});
