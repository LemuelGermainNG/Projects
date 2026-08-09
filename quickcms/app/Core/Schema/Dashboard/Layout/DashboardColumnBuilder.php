<?php

declare(strict_types=1);

namespace App\Core\Schema\Dashboard\Layout;

use App\Core\Builder\Builder;

final class DashboardColumnBuilder extends Builder
{
    public static function schema(): string
    {
        return DashboardColumnSchema::class;
    }

    public function build(): array
    {
        /** @var DashboardColumnSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'width' => $this->evaluate(
                $schema->widthValue(),
            ),

            'widget' => $this->compileChild(
                $schema->widgetValue(),
            ),

            'props' => $schema->props(),
        ];
    }
}
