<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Concerns;

use App\Core\Schema\Action\Enums\ActionColor;

trait HasColor
{
    /**
     * Action color.
     */
    protected ActionColor $color = ActionColor::Primary;

    /**
     * Get or set the action color.
     */
    public function color(
        ?ActionColor $color = null,
    ): ActionColor|static {
        if ($color === null) {
            return $this->color;
        }

        $this->color = $color;

        return $this;
    }
}
