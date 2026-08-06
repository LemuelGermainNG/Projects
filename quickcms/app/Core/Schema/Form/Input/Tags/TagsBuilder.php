<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Tags;

use App\Core\Schema\Form\Base\SelectInputBaseBuilder;

final class TagsBuilder extends SelectInputBaseBuilder
{
    public static function schema(): string
    {
        return TagsSchema::class;
    }

    public function build(): array
    {
        /** @var TagsSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'tagType',
            $this->evaluate(
                $schema->tagType(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'locale',
            $this->evaluate(
                $schema->locale(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'separator',
            $this->evaluate(
                $schema->separator(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'maxTags',
            $this->evaluate(
                $schema->maxTags(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'suggestions',
            $this->evaluate(
                $schema->isSuggestions(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'createOnBlur',
            $this->evaluate(
                $schema->isCreateOnBlur(),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
