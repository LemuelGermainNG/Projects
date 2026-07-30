<?php

declare(strict_types=1);

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Support\Enums\Icons\Heroicons;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a header schema', function (): void {
    $header = HeaderSchema::make()
        ->title('Users')
        ->description('Manage application users.')
        ->icon(Heroicons::Users)
        ->props([
            'foo' => 'bar',
        ]);

    expect(
        $header->compile(
            BuilderRegistryFactory::make(),
        ),
    )->toBe([
        'type' => 'header',
        'title' => 'Users',
        'description' => 'Manage application users.',
        'icon' => 'heroicon-o-users',
        'props' => [
            'foo' => 'bar',
        ],
    ]);
});
