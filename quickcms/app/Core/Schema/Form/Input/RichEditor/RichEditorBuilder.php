<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\RichEditor;

use App\Core\Schema\Form\Base\EditorInputBaseBuilder;

final class RichEditorBuilder extends EditorInputBaseBuilder
{
    public static function schema(): string
    {
        return RichEditorSchema::class;
    }

    public function build(): array
    {
        /** @var RichEditorSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'tables',
            $this->evaluate($schema->isTables()),
        );

        $this->addIfNotNull(
            $data,
            'attachments',
            $this->evaluate($schema->isAttachments()),
        );

        $this->addIfNotNull(
            $data,
            'bubbleMenu',
            $this->evaluate($schema->isBubbleMenu()),
        );

        $this->addIfNotNull(
            $data,
            'floatingMenu',
            $this->evaluate($schema->isFloatingMenu()),
        );

        $this->addIfNotNull(
            $data,
            'slashCommands',
            $this->evaluate($schema->isSlashCommands()),
        );

        $this->addIfNotNull(
            $data,
            'comments',
            $this->evaluate($schema->isComments()),
        );

        $this->addIfNotNull(
            $data,
            'collaboration',
            $this->evaluate($schema->isCollaboration()),
        );

        $this->addIfNotNull(
            $data,
            'embeds',
            $this->evaluateEnums($schema->embeds()),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
