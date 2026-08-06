<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Flex\FlexSchema;
use App\Core\Support\Enum\Layout\Align;
use App\Core\Support\Enum\Layout\Direction;
use App\Core\Support\Enum\Layout\Justify;
use App\Core\Support\Enum\Layout\Wrap;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a flex schema', function (): void {
    $flex = FlexSchema::make()
        ->direction(Direction::Row)
        ->justify(Justify::Between)
        ->align(Align::Center)
        ->wrap(Wrap::Wrap)
        ->gap(4)
        ->children([
            HeaderSchema::make()
                ->title('Users'),
        ]);

    expect(
        $flex->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'flex',

        'direction' => 'row',

        'justify' => 'between',

        'align' => 'center',

        'wrap' => 'wrap',

        'gap' => 4,

        'children' => [
            [
                'type' => 'header',
                'title' => 'Users',
                'description' => null,
                'icon' => null,
                'props' => [],
            ],
        ],

        'props' => [],
    ]);
});
