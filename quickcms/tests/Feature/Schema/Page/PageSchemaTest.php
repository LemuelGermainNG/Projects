<?php

declare(strict_types=1);

use App\Core\Schema\Layout\Container\ContainerSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Page\PageSchema;

it('creates a page schema', function (): void {
    expect(
        PageSchema::make(),
    )->toBeInstanceOf(PageSchema::class);
});

it('sets page properties', function (): void {
    $metadata = [
        'title' => 'Users',
        'description' => 'Manage users',
    ];

    $header = HeaderSchema::make()
        ->title('Users')
        ->description('Manage users');

    $content = ContainerSchema::make();

    $page = PageSchema::make()
        ->metadata($metadata)
        ->header($header)
        ->content($content)
        ->props([
            'fluid' => true,
        ]);

    expect($page->metadata())
        ->toBe($metadata);

    expect($page->header())
        ->toBe($header);

    expect($page->content())
        ->toBe($content);

    expect($page->props())
        ->toBe([
            'fluid' => true,
        ]);
});

it('is immutable', function (): void {
    $page = PageSchema::make();

    $updated = $page
        ->metadata([
            'title' => 'Users',
        ])
        ->header(
            HeaderSchema::make()
                ->title('Users'),
        )
        ->content(
            ContainerSchema::make(),
        );

    expect($updated)
        ->not->toBe($page);

    expect($page->metadata())
        ->toBe([]);

    expect($page->header())
        ->toBeNull();

    expect($page->content())
        ->toBeNull();

    expect($updated->metadata())
        ->toBe([
            'title' => 'Users',
        ]);

    expect($updated->header())
        ->toBeInstanceOf(HeaderSchema::class);

    expect($updated->content())
        ->toBeInstanceOf(ContainerSchema::class);
});
