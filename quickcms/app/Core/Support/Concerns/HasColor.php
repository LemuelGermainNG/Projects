<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Enums\Color;
use Closure;

trait HasColor
{
    protected Color|Closure $color = Color::Primary;

    public function color(
        Color|Closure|null $color = null,
    ): Color|Closure|static {
        if ($color === null) {
            return $this->color;
        }

        return $this->with('color', $color);
    }
}
