<?php

declare(strict_types=1);

use App\Core\Schema\Element\Pagination\PaginationSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a pagination schema', function (): void {
    $pagination = PaginationSchema::make()
        ->perPage(25)
        ->options([
            10,
            25,
            50,
        ])
        ->simple();

    expect(
        $pagination->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'pagination',

        'enabled' => true,

        'perPage' => 25,

        'options' => [
            10,
            25,
            50,
        ],

        'simple' => true,
    ]);
});

it('compiles a disabled pagination', function (): void {
    $pagination = PaginationSchema::make()
        ->disable();

    expect(
        $pagination->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'pagination',

        'enabled' => false,

        'perPage' => 15,

        'options' => [
            15,
            30,
            50,
            100,
        ],

        'simple' => false,
    ]);
});
