<?php

declare(strict_types=1);

namespace App\Core\Schema\Dashboard\Layout;

use App\Core\Builder\Builder;

final class DashboardRowBuilder extends Builder
{
    public static function schema(): string
    {
        return DashboardRowSchema::class;
    }

    public function build(): array
    {
        /** @var DashboardRowSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'gap' => $this->evaluate(
                $schema->gapValue(),
            ),

            'columns' => $this->compileSchemas(
                $schema->columns(),
            ),

            'props' => $schema->props(),
        ];
    }
}
