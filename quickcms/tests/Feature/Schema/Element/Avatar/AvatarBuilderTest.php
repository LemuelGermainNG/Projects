<?php

declare(strict_types=1);

use App\Core\Schema\Element\Avatar\AvatarSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles an avatar schema', function (): void {
    $avatar = AvatarSchema::make()
        ->name('John Doe')
        ->url('https://example.com/avatar.png')
        ->alt('John Doe');

    expect(
        $avatar->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'avatar',

        'name' => 'John Doe',

        'url' => 'https://example.com/avatar.png',

        'alt' => 'John Doe',

        'props' => [],
    ]);
});
