<?php

declare(strict_types=1);

use App\Core\Support\Enum\Date\WeekDay;
use App\Core\Schema\Form\Input\DateTime\DateTimeSchema;

it('sets datetime properties', function (): void {
    $input = DateTimeSchema::make()
        ->format('Y-m-d H:i:s')
        ->displayFormat('d/m/Y H:i')
        ->hoursStep(1)
        ->minutesStep(15)
        ->seconds()
        ->secondsStep(5)
        ->twentyFourHours()
        ->weekStartsOn(WeekDay::Monday);

    expect($input->hoursStep())->toBe(1);
    expect($input->minutesStep())->toBe(15);
    expect($input->secondsStep())->toBe(5);
    expect($input->isSeconds())->toBeTrue();
    expect($input->isTwentyFourHours())->toBeTrue();
    expect($input->weekStartsOn())->toBe(WeekDay::Monday);
});
