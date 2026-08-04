<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Element\Filter\FilterSchema;
use Closure;

trait HasFilters
{
    /**
     * @var array<int,string|FilterSchema>|Closure|null
     */
    protected array|Closure|null $filters = null;

    /**
     * @param array<int,string|FilterSchema>|Closure|null $filters
     *
     * @return array<int,string|FilterSchema>|Closure|null|static
     */
    public function filters(
        array|Closure|null $filters = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->filters;
        }

        return $this->with(
            'filters',
            $filters,
        );
    }
}
