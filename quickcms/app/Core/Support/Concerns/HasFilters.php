<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Element\Filter\FilterSchema;

trait HasFilters
{
    /**
     * @var array<int, FilterSchema>
     */
    protected array $filters = [];

    /**
     * @param array<int, FilterSchema>|null $filters
     *
     * @return array<int, FilterSchema>|static
     */
    public function filters(?array $filters = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->filters;
        }

        return $this->with(
            'filters',
            $filters,
        );
    }
}
