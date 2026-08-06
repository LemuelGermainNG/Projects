<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\CheckboxList\CheckboxListSchema;
use App\Core\Support\Enum\Layout\Direction;
use Tests\Support\Assertions\OptionAssertions;
use Tests\Support\Builders\OptionBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a checkbox list', function (): void {
    $list = CheckboxListSchema::make()
        ->columns(2)
        ->direction(Direction::Column)
        ->inline()
        ->options([
            OptionBuilderFactory::administrator(),
            OptionBuilderFactory::user(),
        ]);

    expect(
        $list->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'checkbox-list',

        'columns' => 2,

        'direction' => 'column',

        'inline' => true,

        'options' => [
            OptionAssertions::administrator(),
            OptionAssertions::user(),
        ],
    ]);
});
