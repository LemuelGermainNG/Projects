<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Section\SectionSchema;
use App\Core\Schema\Layout\Stack\StackSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a section schema', function (): void {
    $section = SectionSchema::make()
        ->header(
            HeaderSchema::make()
                ->title('Users')
                ->description('Manage users'),
        )
        ->child(
            StackSchema::make(),
        )
        ->props([
            'bordered' => true,
        ]);

    expect(
        $section->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'section',

        'header' => [
            'type' => 'header',
            'title' => 'Users',
            'description' => 'Manage users',
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
            'bordered' => true,
        ],
    ]);
});
