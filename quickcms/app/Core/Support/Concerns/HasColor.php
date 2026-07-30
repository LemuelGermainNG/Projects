<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Enums\Color;

trait HasColor
{
    /**
     *  color.
     */
    protected Color $color = Color::Primary;

    /**
     * Get or set the  color.
     */
    public function color(
        ?Color $color = null,
    ): Color|static {
        if ($color === null) {
            return $this->color;
        }

        $this->color = $color;

        return $this;
    }
}
