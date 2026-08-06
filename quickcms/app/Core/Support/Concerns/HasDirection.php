<?php

namespace App\Core\Support\Concerns;

use App\Core\Support\Enum\Layout\Direction;

trait HasDirection
{
    protected Direction $direction = Direction::Column;

    public function direction(
        Direction|string|null $direction = null,
    ): Direction|static {
        if (func_num_args() === 0) {
            return $this->direction;
        }

        if (is_string($direction)) {
            $direction = Direction::from($direction);
        }

        return $this->with('direction', $direction);
    }
}
