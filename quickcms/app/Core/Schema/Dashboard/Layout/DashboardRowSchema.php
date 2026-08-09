<?php

declare(strict_types=1);

namespace App\Core\Schema\Dashboard\Layout;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasProps;

final class DashboardRowSchema extends Schema
{
    use HasProps;

    /**
     * @var list<DashboardColumnSchema>
     */
    protected array $columns = [];

    protected int|array|null $gap = null;

    /**
     * @param list<DashboardColumnSchema>|null $columns
     */
    public function columns(?array $columns = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->columns;
        }

        return $this->with(
            'columns',
            $columns ?? [],
        );
    }

    public function gap(
        int|array|null $gap,
    ): static {
        return $this->with(
            'gap',
            $gap,
        );
    }

    public function gapValue(): int|array|null
    {
        return $this->gap;
    }

    public function hasColumns(): bool
    {
        return $this->columns !== [];
    }
}
