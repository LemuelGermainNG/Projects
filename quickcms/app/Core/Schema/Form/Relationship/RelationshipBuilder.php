<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Relationship;

use App\Core\Builder\Builder;

final class RelationshipBuilder extends Builder
{
    public static function schema(): string
    {
        return RelationshipSchema::class;
    }

    public function build(): array
    {
        /** @var RelationshipSchema $schema */
        $schema = $this->schema;

        $data = [
            'type' => 'relationship',
        ];

        $source = null;

        if ($schema->hasSource()) {
            $source = $this->resolveSource(
                $schema->source(),
            );
        }

        $this->addIfNotNull(
            $data,
            'source',
            $source::class,
        );

        $this->addIfNotNull(
            $data,
            'label',
            $this->evaluate(
                $schema->label(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'value',
            $this->evaluate(
                $schema->value(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'filters',
            $this->compileCollection(
                $schema->filters(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'sort',
            $this->compileCollection(
                $schema->sort(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'include',
            $this->compileCollection(
                $schema->include(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'append',
            $this->compileCollection(
                $schema->append(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'cache',
            $this->evaluate(
                $schema->cache(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'limit',
            $this->evaluate(
                $schema->limit(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'search',
            $this->evaluate(
                $schema->search(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'optionActions',
            $this->compileCollection(
                $schema->optionActions(),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
