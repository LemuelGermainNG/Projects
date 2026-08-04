<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Field;

use App\Core\Builder\Builder;

final class FieldBuilder extends Builder
{
    public static function schema(): string
    {
        return FieldSchema::class;
    }

    public function build(): array
    {
        /** @var FieldSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'field',

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
