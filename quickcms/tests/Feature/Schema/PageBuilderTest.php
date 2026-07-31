<?php

declare(strict_types=1);

use App\Core\Schema\Container\ContainerSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Page\PageSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a page schema', function (): void {
    $page = PageSchema::make()
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
