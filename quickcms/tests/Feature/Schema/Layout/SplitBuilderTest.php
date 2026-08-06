<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Split\SplitSchema;
use App\Core\Support\Enum\Layout\Direction;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a split schema', function (): void {
    $split = SplitSchema::make()
        ->direction(Direction::Row)
        ->ratio(30)
        ->start(
            HeaderSchema::make()
                ->title('Navigation'),
        )
        ->end(
            HeaderSchema::make()
                ->title('Content'),
        )
        ->props([
            'resizable' => true,
        ]);

    expect(
        $split->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'split',

        'direction' => 'row',

        'ratio' => 30,

        'start' => [
            'type' => 'header',
            'title' => 'Navigation',
            'description' => null,
            'icon' => null,
            'props' => [],
        ],

        'end' => [
            'type' => 'header',
            'title' => 'Content',
            'description' => null,
            'icon' => null,
            'props' => [],
        ],

        'props' => [
            'resizable' => true,
        ],
    ]);
});
