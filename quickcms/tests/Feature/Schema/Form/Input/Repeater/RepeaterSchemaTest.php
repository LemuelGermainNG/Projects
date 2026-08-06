<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Repeater\RepeaterSchema;
use App\Core\Support\Enum\Repeater\RepeaterLayout;
use Tests\Support\Builders\RepeaterBuilderFactory;

it('creates a repeater', function (): void {
    expect(
        RepeaterBuilderFactory::make(),
    )->toBeInstanceOf(
        RepeaterSchema::class,
    );
});

it('sets repeater properties', function (): void {
    $repeater = RepeaterBuilderFactory::make();

    expect($repeater->schema())
        ->toHaveCount(2);

    expect($repeater->defaultItems())
        ->toBe(1);

    expect($repeater->minItems())
        ->toBe(1);

    expect($repeater->maxItems())
        ->toBe(10);

    expect($repeater->itemLabel())
        ->toBe('Item');

    expect($repeater->layout())
        ->toBe(
            RepeaterLayout::Grid,
        );

    expect($repeater->isCloneable())
        ->toBeTrue();

    expect($repeater->isCollapsible())
        ->toBeTrue();

    expect($repeater->isReorderable())
        ->toBeTrue();
});
