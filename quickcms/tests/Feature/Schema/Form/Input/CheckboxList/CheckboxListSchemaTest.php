<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\CheckboxList\CheckboxListSchema;
use App\Core\Support\Enums\Layout\Direction;
use Tests\Support\Builders\OptionBuilderFactory;

it('sets checkbox list properties', function (): void {
    $list = CheckboxListSchema::make()
        ->columns(2)
        ->direction(Direction::Column)
        ->inline()
        ->options([
            OptionBuilderFactory::administrator(),
            OptionBuilderFactory::user(),
        ]);

    expect($list->columns())
        ->toBe(2);

    expect($list->direction())
        ->toBe(Direction::Column);

    expect($list->isInline())
        ->toBeTrue();

    expect($list->options())
        ->toHaveCount(2);
});
