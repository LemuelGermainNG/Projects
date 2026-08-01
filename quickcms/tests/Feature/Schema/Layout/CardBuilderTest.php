<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Card\CardSchema;
use App\Core\Schema\Layout\Stack\StackSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a card schema', function (): void {
    $card = CardSchema::make()
        ->header(
            HeaderSchema::make()
                ->title('Statistics')
                ->description('Monthly overview'),
        )
        ->child(
            StackSchema::make(),
        )
        ->props([
            'shadow' => true,
        ]);

    expect(
        $card->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'card',

        'header' => [
            'type' => 'header',
            'title' => 'Statistics',
            'description' => 'Monthly overview',
            'icon' => null,
            'props' => [],
        ],

        'child' => [
            'type' => 'stack',
            'gap' => null,
            'children' => [],
            'props' => [],
        ],

        'props' => [
            'shadow' => true,
        ],
    ]);
});
