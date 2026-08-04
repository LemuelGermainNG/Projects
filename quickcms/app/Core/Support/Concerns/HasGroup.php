<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasGroup
{
    protected ?string $group = null;

    public function group(
        ?string $group = null,
    ): string|null|static {
        if (func_num_args() === 0) {
            return $this->group;
        }

        return $this->with(
            'group',
            $group,
        );
    }
}
