<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Time\TimeSchema;

it('sets time properties', function (): void {
    $input = TimeSchema::make()
        ->hoursStep(2)
        ->minutesStep(30)
        ->seconds()
        ->secondsStep(10)
        ->twentyFourHours(false);

    expect($input->hoursStep())->toBe(2);
    expect($input->minutesStep())->toBe(30);
    expect($input->secondsStep())->toBe(10);
    expect($input->isSeconds())->toBeTrue();
    expect($input->isTwentyFourHours())->toBeFalse();
});
