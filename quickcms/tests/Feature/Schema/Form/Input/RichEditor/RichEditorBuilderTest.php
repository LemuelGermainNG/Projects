<?php

declare(strict_types=1);

namespace Tests\Feature\Schema\Form\Input\RichEditor;

use Tests\Support\Assertions\RichEditorAssertions;
use Tests\Support\Builders\RichEditorBuilderFactory;
use Tests\Support\Factories\BuilderRegistryFactory;

it('compiles a rich editor', function (): void {
    expect(
        RichEditorBuilderFactory::make()
            ->compile(
                BuilderRegistryFactory::make(),
            ),
    )->toMatchArray(
        RichEditorAssertions::make(),
    );
});
