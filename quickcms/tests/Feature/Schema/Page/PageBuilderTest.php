<?php

declare(strict_types=1);

use App\Core\Schema\Layout\Container\ContainerSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Page\PageSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a page schema with metadata', function (): void {
    $page = PageSchema::make()
        ->metadata([
            'title' => 'Users',
            'description' => 'Manage users',
        ])
        ->header(
            HeaderSchema::make()
                ->title('Users')
                ->description('Manage users'),
        )
        ->content(
            ContainerSchema::make(),
        )
        ->props([
            'fluid' => true,
        ]);

    expect(
        $page->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'page',

        'metadata' => [
            'title' => 'Users',
            'description' => 'Manage users',
        ],

        'header' => [
            'type' => 'header',
            'title' => 'Users',
            'description' => 'Manage users',
            'icon' => null,
            'props' => [],
        ],

        'content' => [
            'type' => 'container',
            'children' => [],
            'props' => [],
        ],

        'props' => [
            'fluid' => true,
        ],
    ]);
});
