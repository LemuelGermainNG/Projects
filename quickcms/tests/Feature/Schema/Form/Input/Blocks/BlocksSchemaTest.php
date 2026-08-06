<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Blocks\BlocksSchema;
use Tests\Support\Builders\BlocksBuilderFactory;

it('creates blocks input', function (): void {
    expect(
        BlocksBuilderFactory::make(),
    )->toBeInstanceOf(
        BlocksSchema::class,
    );
});

it('sets blocks properties', function (): void {
    $blocks = BlocksBuilderFactory::make();

    expect($blocks->name())
        ->toBe('content');

    expect($blocks->blocks())
        ->toHaveCount(1);
});
