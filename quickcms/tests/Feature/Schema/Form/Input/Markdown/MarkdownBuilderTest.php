<?php

declare(strict_types=1);

use Tests\Support\Assertions\MarkdownAssertions;
use Tests\Support\Builders\MarkdownBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a markdown input', function (): void {
    expect(
        MarkdownBuilderFactory::make()->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray(
        MarkdownAssertions::make(),
    );
});
