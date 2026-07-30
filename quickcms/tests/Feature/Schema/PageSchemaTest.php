<?php

declare(strict_types=1);

use App\Core\Schema\Container\ContainerSchema;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Page\PageSchema;

it('creates a page schema', function (): void {
    expect(
        PageSchema::make(),
    )->toBeInstanceOf(PageSchema::class);
});

it('sets page properties', function (): void {
    $header = HeaderSchema::make()
        ->title('Users');

    $container = ContainerSchema::make();

    $page = PageSchema::make()
        ->header($header)
        ->content($container)
        ->props([
            'foo' => 'bar',
        ]);

    expect($page->header())->toBe($header)
        ->and($page->content())->toBe($container)
        ->and($page->props())->toBe([
            'foo' => 'bar',
        ]);
});

it('is immutable', function (): void {
    $page = PageSchema::make();

    $updated = $page->header(
        HeaderSchema::make()
            ->title('Users')
    );

    expect($updated)
        ->not->toBe($page);

    expect($page->header())
        ->toBeNull();
});
