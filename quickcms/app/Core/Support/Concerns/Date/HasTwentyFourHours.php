<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Date;

use Closure;

trait HasTwentyFourHours
{
    protected bool|Closure $twentyFourHours = true;

    public function twentyFourHours(
        bool|Closure $enabled = true,
    ): static {
        return $this->with(
            'twentyFourHours',
            $enabled,
        );
    }

    public function isTwentyFourHours(): bool|Closure
    {
        return $this->twentyFourHours;
    }
}
