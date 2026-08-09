<?php

declare(strict_types=1);

namespace App\Core\Schema\Dashboard\Layout;

use App\Core\Builder\Builder;

final class DashboardLayoutBuilder extends Builder
{
    public static function schema(): string
    {
        return DashboardLayoutSchema::class;
    }

    public function build(): array
    {
        /** @var DashboardLayoutSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'columns' => $this->evaluate(
                $schema->columnsValue(),
            ),

            'gap' => $this->evaluate(
                $schema->gapValue(),
            ),

            'rows' => $this->compileSchemas(
                $schema->rows(),
            ),

            'props' => $schema->props(),
        ];
    }
}
