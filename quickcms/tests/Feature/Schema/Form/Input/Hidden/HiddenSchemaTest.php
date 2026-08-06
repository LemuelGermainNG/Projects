<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Hidden\HiddenSchema;
use Tests\Support\Builders\HiddenBuilderFactory;

it('creates a hidden input', function (): void {
    expect(
        HiddenBuilderFactory::make(),
    )->toBeInstanceOf(
        HiddenSchema::class,
    );
});

it('sets hidden properties', function (): void {
    expect(
        HiddenBuilderFactory::make()->value(),
    )->toBe(15);
});
