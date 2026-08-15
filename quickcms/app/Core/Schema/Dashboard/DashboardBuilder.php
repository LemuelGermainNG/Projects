<?php

declare(strict_types=1);

namespace App\Core\Schema\Dashboard;

use App\Core\Builder\Builder;

final class DashboardBuilder extends Builder
{
    public static function schema(): string
    {
        return DashboardSchema::class;
    }

    public function build(): array
    {
        /** @var DashboardSchema $schema */
        $schema = $this->schema;

        return [
            'type' => $this->type(),

            'title' => $this->evaluate(
                $schema->title(),
            ),

            'description' => $this->evaluate(
                $schema->description(),
            ),

            'icon' => $this->evaluate(
                $schema->icon(),
            ),

            'visible' => $this->evaluate(
                $schema->isVisible(),
            ),

            'layout' => $this->compileChild(
                $schema->layoutValue(),
            ),

            'state' => $this->compileChild(
                $schema->stateSchema(),
            ),

            'filters' => $this->compileSchemas(
                $schema->filterSchemas(),
            ),

            'actions' => $this->compileSchemas(
                $schema->actionSchemas(),
            ),

            'refresh' => $this->evaluate(
                $schema->refreshValue(),
            ),

            'props' => $schema->props(),
        ];
    }
}
