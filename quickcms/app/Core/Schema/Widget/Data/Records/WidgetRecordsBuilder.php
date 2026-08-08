<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data\Records;

use App\Core\Builder\Builder;

final class WidgetRecordsBuilder extends Builder
{
    public static function schema(): string
    {
        return WidgetRecordsSchema::class;
    }

    public function build(): array
    {
        /** @var WidgetRecordsSchema $schema */
        $schema = $this->schema;

        return $this->evaluate(
            $schema->recordsValue(),
        );
    }
}
