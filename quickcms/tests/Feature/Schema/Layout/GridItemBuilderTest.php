<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Grid\GridItemSchema;
use App\Core\Support\Enums\Layout\Align;
use App\Core\Support\Enums\Layout\Justify;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a grid item schema', function (): void {
    $item = GridItemSchema::make()
        ->span(12)
        ->spanSm(12)
        ->spanMd(6)
        ->spanLg(4)
        ->spanXl(3)
        ->offset(1)
        ->order(2)
        ->align(Align::Center)
        ->justify(Justify::End)
        ->child(
            HeaderSchema::make()
                ->title('Users'),
        )
        ->props([
            'class' => 'statistics-card',
        ]);

    expect(
        $item->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'grid-item',

        'span' => 12,

        'spanSm' => 12,

        'spanMd' => 6,

        'spanLg' => 4,

        'spanXl' => 3,

        'offset' => 1,

        'order' => 2,

        'align' => 'center',

        'justify' => 'end',

        'child' => [
            'type' => 'header',
            'title' => 'Users',
            'description' => null,
            'icon' => null,
            'props' => [],
        ],

        'props' => [
            'class' => 'statistics-card',
        ],
    ]);
});
