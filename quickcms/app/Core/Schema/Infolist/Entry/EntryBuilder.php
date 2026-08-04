<?php

declare(strict_types=1);

namespace App\Core\Schema\Infolist\Entry;

use App\Core\Builder\Builder;

final class EntryBuilder extends Builder
{
    public static function schema(): string
    {
        return EntrySchema::class;
    }

    public function build(): array
    {
        /** @var EntrySchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'label' => $this->evaluate($schema->label()),

            'description' => $this->evaluate($schema->description()),

            'child' => $this->compileChild(
                $schema->child(),
            ),

            'props' => $schema->props(),
        ];
    }
}
