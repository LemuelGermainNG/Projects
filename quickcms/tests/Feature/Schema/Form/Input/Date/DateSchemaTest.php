<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Date\DateSchema;

it('sets date properties', function (): void {
    $date = DateSchema::make()
        ->format('Y-m-d')
        ->displayFormat('d/m/Y')
        ->timezone('Europe/Paris')
        ->minDate('2025-01-01')
        ->maxDate('2025-12-31');

    expect($date->format())
        ->toBe('Y-m-d');

    expect($date->displayFormat())
        ->toBe('d/m/Y');

    expect($date->timezone())
        ->toBe('Europe/Paris');

    expect($date->minDate())
        ->toBe('2025-01-01');

    expect($date->maxDate())
        ->toBe('2025-12-31');
});
