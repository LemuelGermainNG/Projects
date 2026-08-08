<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data;

use App\Core\Builder\Builder;

final class WidgetDataBuilder extends Builder
{
    public static function schema(): string
    {
        return WidgetDataSchema::class;
    }

    public function build(): array
    {
        /** @var WidgetDataSchema $schema */
        $schema = $this->schema;

        $data = [];

        $records = $this->compileChild(
            $schema->recordsSchema(),
        );

        $this->addIfNotNull(
            $data,
            'records',
            $records,
        );

        $pagination = $this->compileChild(
            $schema->paginationSchema(),
        );

        $this->addIfNotNull(
            $data,
            'pagination',
            $pagination,
        );

        $loading = $this->compileChild(
            $schema->loadingSchema(),
        );

        $this->addIfNotNull(
            $data,
            'loading',
            $loading,
        );

        $empty = $this->compileChild(
            $schema->emptySchema(),
        );

        $this->addIfNotNull(
            $data,
            'empty',
            $empty,
        );

        return $data;
    }
}
