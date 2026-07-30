<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasProps
{
    protected array $props = [];

    public function props(?array $props = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->props;
        }

        return $this->with('props', $props);
    }
}
