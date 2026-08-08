<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data\Pagination;

use App\Core\Schema\Schema;
use Closure;

final class WidgetPaginationSchema extends Schema
{
    protected bool|Closure $enabled = false;

    protected int|Closure|null $perPage = null;

    protected int|Closure|null $page = null;

    public function enabled(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'enabled',
            $enabled,
        );
    }

    public function perPage(
        int|Closure|null $perPage,
    ): static {
        return $this->with(
            'perPage',
            $perPage,
        );
    }

    public function page(
        int|Closure|null $page,
    ): static {
        return $this->with(
            'page',
            $page,
        );
    }

    public function isEnabled(): bool|Closure
    {
        return $this->enabled;
    }

    public function perPageValue(): int|Closure|null
    {
        return $this->perPage;
    }

    public function pageValue(): int|Closure|null
    {
        return $this->page;
    }
}
