<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Date\DateSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a date input', function (): void {
    $date = DateSchema::make()
        ->format('Y-m-d')
        ->displayFormat('d/m/Y')
        ->timezone('Europe/Paris');

    expect(
        $date->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toMatchArray([
        'type' => 'date',

        'format' => 'Y-m-d',

        'displayFormat' => 'd/m/Y',

        'timezone' => 'Europe/Paris',
    ]);
});
