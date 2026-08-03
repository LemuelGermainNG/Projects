<?php

declare(strict_types=1);

use App\Core\Schema\Element\Image\ImageSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an image schema', function (): void {
    $image = ImageSchema::make()
        ->url('https://example.com/avatar.png')
        ->alt('Avatar')
        ->width(80)
        ->height(80);

    expect(
        $image->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'image',

        'url' => 'https://example.com/avatar.png',

        'alt' => 'Avatar',

        'width' => 80,

        'height' => 80,

        'props' => [],
    ]);
});
