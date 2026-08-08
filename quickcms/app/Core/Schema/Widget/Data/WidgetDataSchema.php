<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data;

use App\Core\Schema\Schema;
use App\Core\Schema\Widget\Data\Empty\WidgetEmptySchema;
use App\Core\Schema\Widget\Data\Loading\WidgetLoadingSchema;
use App\Core\Schema\Widget\Data\Pagination\WidgetPaginationSchema;
use App\Core\Schema\Widget\Data\Records\WidgetRecordsSchema;

final class WidgetDataSchema extends Schema
{
    protected WidgetRecordsSchema|null $records = null;

    protected WidgetPaginationSchema|null $pagination = null;

    protected WidgetLoadingSchema|null $loading = null;

    protected WidgetEmptySchema|null $empty = null;

    public function records(
        WidgetRecordsSchema $records,
    ): static {
        return $this->with(
            'records',
            $records,
        );
    }

    public function pagination(
        WidgetPaginationSchema $pagination,
    ): static {
        return $this->with(
            'pagination',
            $pagination,
        );
    }

    public function loading(
        WidgetLoadingSchema $loading,
    ): static {
        return $this->with(
            'loading',
            $loading,
        );
    }

    public function empty(
        WidgetEmptySchema $empty,
    ): static {
        return $this->with(
            'empty',
            $empty,
        );
    }

    public function recordsSchema(): ?WidgetRecordsSchema
    {
        return $this->records;
    }

    public function paginationSchema(): ?WidgetPaginationSchema
    {
        return $this->pagination;
    }

    public function loadingSchema(): ?WidgetLoadingSchema
    {
        return $this->loading;
    }

    public function emptySchema(): ?WidgetEmptySchema
    {
        return $this->empty;
    }
}
