<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasOptions
{
    /**
     * @var array<string|int, mixed>|Closure|null
     */
    protected array|Closure|null $options = null;

    /**
     * @param array<string|int, mixed>|Closure|null $options
     *
     * @return array<string|int, mixed>|Closure|null|static
     */
    public function options(
        array|Closure|null $options = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->options;
        }

        return $this->with(
            'options',
            $options,
        );
    }
}
