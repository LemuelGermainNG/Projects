<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Radio\RadioSchema;
use Tests\Support\Assertions\OptionAssertions;
use Tests\Support\Builders\OptionBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a radio', function (): void {
    $radio = RadioSchema::make()
        ->inline()
        ->options([
            OptionBuilderFactory::administrator(),
            OptionBuilderFactory::user(),
        ]);

    expect(
        $radio->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'radio',

        'inline' => true,

        'options' => [
            OptionAssertions::administrator(),
            OptionAssertions::user(),
        ],
    ]);
});
