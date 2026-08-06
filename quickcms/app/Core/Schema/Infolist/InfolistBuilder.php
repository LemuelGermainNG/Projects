<?php

declare(strict_types=1);

namespace App\Core\Schema\Infolist;

use App\Core\Builder\Builder;

final class InfolistBuilder extends Builder
{
    public static function schema(): string
    {
        return InfolistSchema::class;
    }

    public function build(): array
    {
        /** @var InfolistSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'source' => $schema->source(),

            'schema' => $this->compileSchemas(
                $schema->schema(),
            ),

            'props' => $schema->props(),
        ];
    }
}
