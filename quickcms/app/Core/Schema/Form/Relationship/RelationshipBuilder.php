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
            'type' => $this->type(),

            'props' => $schema->props(),
        ];

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'source',
            $this->evaluate(
                $schema->source(),
            ),
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
            'search',
            $this->evaluate(
                $schema->search(),
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
            'filters',
            $this->compileCollection(
                $this->evaluate(
                    $schema->filters(),
                ),
            ),
        );

        $this->addIfNotNull(
            $data,
            'sort',
            $this->evaluate(
                $schema->sort(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'includes',
            $this->evaluate(
                $schema->includes(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'appends',
            $this->evaluate(
                $schema->appends(),
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
            'optionActions',
            $this->compileCollection(
                $this->evaluate(
                    $schema->optionActions(),
                ),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
