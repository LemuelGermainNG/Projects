<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data\Pagination;

use App\Core\Builder\Builder;

final class WidgetPaginationBuilder extends Builder
{
    public static function schema(): string
    {
        return WidgetPaginationSchema::class;
    }

    public function build(): array
    {
        /** @var WidgetPaginationSchema $schema */
        $schema = $this->schema;

        $enabled = $this->evaluate(
            $schema->isEnabled(),
        );

        $data = [
            'enabled' => $enabled,
        ];

        $perPage = $this->evaluate(
            $schema->perPageValue(),
        );

        if ($perPage !== null) {
            $data['perPage'] = $perPage;
        }

        $page = $this->evaluate(
            $schema->pageValue(),
        );

        if ($page !== null) {
            $data['page'] = $page;
        }

        return $data;
    }
}
