<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasIncludes
{
    /**
     * @var array<int, string>|Closure|null
     */
    protected array|Closure|null $includes = null;

    /**
     * @param array<int, string>|Closure|null $includes
     *
     * @return array<int, string>|Closure|null|static
     */
    public function includes(
        array|Closure|null $includes = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->includes;
        }

        return $this->with(
            'includes',
            $includes,
        );
    }
}
