<?php

declare(strict_types=1);

namespace App\Core\Schema\Dashboard\Layout;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasProps;

final class DashboardLayoutSchema extends Schema
{
    use HasProps;

    /**
     * @var list<DashboardRowSchema>
     */
    protected array $rows = [];

    protected int|array|null $columns = null;

    protected int|array|null $gap = null;

    /**
     * @param list<DashboardRowSchema>|null $rows
     */
    public function rows(?array $rows = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->rows;
        }

        return $this->with(
            'rows',
            $rows ?? [],
        );
    }

    public function columns(
        int|array|null $columns,
    ): static {
        return $this->with(
            'columns',
            $columns,
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

    public function columnsValue(): int|array|null
    {
        return $this->columns;
    }

    public function gapValue(): int|array|null
    {
        return $this->gap;
    }

    public function hasRows(): bool
    {
        return $this->rows !== [];
    }
}
