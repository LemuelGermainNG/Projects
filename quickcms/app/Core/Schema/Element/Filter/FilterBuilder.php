<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Filter;

use App\Core\Builder\Builder;

final class FilterBuilder extends Builder
{
    public static function schema(): string
    {
        return FilterSchema::class;
    }

    public function build(): array
    {
        /** @var FilterSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'filter',

            'name' => $schema->name(),

            'label' => $this->evaluate(
                $schema->label(),
            ),

            'description' => $this->evaluate(
                $schema->description(),
            ),

            'child' => $this->compileChild(
                $schema->child(),
            ),

            'props' => $schema->props(),
        ];
    }
}
