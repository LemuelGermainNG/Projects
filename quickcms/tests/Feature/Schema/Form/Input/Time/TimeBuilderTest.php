<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Time\TimeSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a time input', function (): void {
    $input = TimeSchema::make()
        ->hoursStep(2)
        ->minutesStep(30)
        ->seconds()
        ->secondsStep(10)
        ->twentyFourHours(false);

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'time',

        'hoursStep' => 2,
        'minutesStep' => 30,
        'secondsStep' => 10,
        'seconds' => true,
        'twentyFourHours' => false,
    ]);
});
