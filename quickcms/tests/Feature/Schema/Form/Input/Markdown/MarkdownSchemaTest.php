<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Markdown\MarkdownSchema;
use App\Core\Support\Enum\Markdown\MarkdownFlavor;
use Tests\Support\Builders\MarkdownBuilderFactory;

it('creates a markdown input', function (): void {
    expect(
        MarkdownBuilderFactory::make(),
    )->toBeInstanceOf(
        MarkdownSchema::class,
    );
});

it('sets markdown properties', function (): void {
    $input = MarkdownBuilderFactory::make();

    expect($input->isPreview())->toBeTrue();

    expect($input->isAutosave())->toBeTrue();

    expect($input->isFrontMatter())->toBeTrue();

    expect($input->isHtml())->toBeTrue();

    expect($input->isSyntaxHighlight())->toBeTrue();

    expect($input->isTableOfContents())->toBeTrue();

    expect($input->isMermaid())->toBeTrue();

    expect($input->isEmoji())->toBeTrue();

    expect($input->flavor())->toBe(
        MarkdownFlavor::GitHub,
    );
});
