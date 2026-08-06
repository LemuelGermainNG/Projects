<?php

declare(strict_types=1);

namespace Tests\Feature\Schema\Form\Input\RichEditor;

use App\Core\Schema\Form\Input\RichEditor\RichEditorSchema;
use App\Core\Support\Enum\RichEditor\EmbedProvider;
use Tests\Support\Builders\RichEditorBuilderFactory;

it('creates a rich editor', function (): void {
    expect(
        RichEditorBuilderFactory::make(),
    )->toBeInstanceOf(
        RichEditorSchema::class,
    );
});

it('sets rich editor properties', function (): void {
    $editor = RichEditorBuilderFactory::make();

    expect($editor->isPreview())->toBeTrue();

    expect($editor->isAutosave())->toBeTrue();

    expect($editor->isUpload())->toBeTrue();

    expect($editor->isMentions())->toBeTrue();

    expect($editor->isTables())->toBeTrue();

    expect($editor->isAttachments())->toBeTrue();

    expect($editor->isBubbleMenu())->toBeTrue();

    expect($editor->isFloatingMenu())->toBeTrue();

    expect($editor->isSlashCommands())->toBeTrue();

    expect($editor->isComments())->toBeTrue();

    expect($editor->isCollaboration())->toBeTrue();

    expect($editor->embeds())->toBe([
        EmbedProvider::YouTube,
        EmbedProvider::Figma,
    ]);
});
