<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

abstract class EditorInputBaseBuilder extends TextInputBaseBuilder
{
    public function build(): array
    {
        /** @var EditorInputBaseSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'toolbar',
            $this->evaluateEnums(
                $schema->toolbar(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'preview',
            $this->evaluate(
                $schema->isPreview(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'minHeight',
            $this->evaluate(
                $schema->minHeight(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'maxHeight',
            $this->evaluate(
                $schema->maxHeight(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'autosave',
            $this->evaluate(
                $schema->isAutosave(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'readonlyMode',
            $this->evaluate(
                $schema->isReadonlyMode(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'upload',
            $this->evaluate(
                $schema->isUpload(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'mentions',
            $this->evaluate(
                $schema->isMentions(),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
