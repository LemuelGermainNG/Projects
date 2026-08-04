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

        return [
            'type' => $this->type(),

            'source' => $this->evaluate(
                $schema->source(),
            ),

            'label' => $this->evaluate(
                $schema->label(),
            ),

            'value' => $this->evaluate(
                $schema->value(),
            ),

            'search' => $this->evaluate(
                $schema->search(),
            ),

            'limit' => $this->evaluate(
                $schema->limit(),
            ),

            'filters' => $this->compileCollection(
                $this->evaluate(
                    $schema->filters(),
                ),
            ),

            'sort' => $this->evaluate(
                $schema->sort(),
            ),

            'includes' => $this->evaluate(
                $schema->includes(),
            ),

            'appends' => $this->evaluate(
                $schema->appends(),
            ),

            'cache' => $this->evaluate(
                $schema->cache(),
            ),

            'props' => $schema->props(),
        ];
    }
}
