<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasAppends
{
    /**
     * @var array<int, string>|Closure|null
     */
    protected array|Closure|null $appends = null;

    /**
     * @param array<int, string>|Closure|null $appends
     *
     * @return array<int, string>|Closure|null|static
     */
    public function appends(
        array|Closure|null $appends = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->appends;
        }

        return $this->with(
            'appends',
            $appends,
        );
    }
}
