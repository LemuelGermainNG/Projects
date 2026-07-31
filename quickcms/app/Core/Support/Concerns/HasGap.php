<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasGap
{
    protected ?int $gap = null;

    public function gap(?int $gap = null): int|static|null
    {
        if (func_num_args() === 0) {
            return $this->gap;
        }

        return $this->with('gap', $gap);
    }
}
