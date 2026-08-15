<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

abstract class SelectInputBaseBuilder extends BaseInputBuilder
{
    public function build(): array
    {
        /** @var SelectInputBaseSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'options',
            $this->compileCollection(
                $this->evaluate(
                    $schema->options(),
                ),
            ),
        );

        $this->addIfNotNull(
            $data,
            'multiple',
            $this->evaluate(
                $schema->isMultiple(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'searchable',
            $this->evaluate(
                $schema->isSearchable(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'native',
            $this->evaluate(
                $schema->isNative(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'clearable',
            $this->evaluate(
                $schema->isClearable(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'loadingMessage',
            $this->evaluate(
                $schema->loadingMessage(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'noResultsMessage',
            $this->evaluate(
                $schema->noResultsMessage(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'relationship',
            $this->compileChild(
                $schema->relationship(),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
