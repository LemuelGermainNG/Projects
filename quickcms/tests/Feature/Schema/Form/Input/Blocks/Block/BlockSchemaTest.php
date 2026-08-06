<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Blocks\Block\BlockSchema;
use Tests\Support\Builders\BlockBuilderFactory;

it('creates a block', function (): void {
    expect(
        BlockBuilderFactory::make(),
    )->toBeInstanceOf(
        BlockSchema::class,
    );
});

it('sets block properties', function (): void {
    $block = BlockBuilderFactory::make();

    expect($block->name())
        ->toBe('hero');

    expect($block->label())
        ->toBe('Hero');

    expect($block->description())
        ->toBe('Hero block');

    expect($block->icon())
        ->toBe('hero');

    expect($block->schema())
        ->toHaveCount(2);
});
