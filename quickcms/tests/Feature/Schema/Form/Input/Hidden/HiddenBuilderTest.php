<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Hidden\HiddenSchema;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a hidden input', function (): void {
    expect(
        HiddenSchema::make()
            ->value(15)
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray([
        'type' => 'hidden',

        'value' => 15,
    ]);
});
