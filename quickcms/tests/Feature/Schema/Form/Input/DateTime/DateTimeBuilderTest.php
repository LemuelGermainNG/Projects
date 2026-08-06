<?php

declare(strict_types=1);

use App\Core\Support\Enum\Date\WeekDay;
use App\Core\Schema\Form\Input\DateTime\DateTimeSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a datetime input', function (): void {
    $input = DateTimeSchema::make()
        ->hoursStep(1)
        ->minutesStep(15)
        ->seconds()
        ->secondsStep(5)
        ->weekStartsOn(WeekDay::Monday);

    expect(
        $input->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'date-time',

        'hoursStep' => 1,
        'minutesStep' => 15,
        'secondsStep' => 5,
        'seconds' => true,
        'weekStartsOn' => 1,
    ]);
});
