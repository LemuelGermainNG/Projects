<?php

declare(strict_types=1);

use Tests\Support\Assertions\FileAssertions;
use Tests\Support\Builders\FileBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a file upload', function (): void {
    expect(
        FileBuilderFactory::document()->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray(
        FileAssertions::document(),
    );
});
