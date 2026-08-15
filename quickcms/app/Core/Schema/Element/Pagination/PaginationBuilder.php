<?php

declare(strict_types=1);

namespace App\Core\Schema\Element\Pagination;

use App\Core\Builder\Builder;

final class PaginationBuilder extends Builder
{
    public static function schema(): string
    {
        return PaginationSchema::class;
    }

    public function build(): array
    {
        /** @var PaginationSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'enabled' => $this->evaluate(
                $schema->isEnabled(),
            ),

            'perPage' => $schema->perPage(),

            'options' => $schema->options(),

            'simple' => $this->evaluate(
                $schema->isSimple(),
            ),
        ];
    }
}
