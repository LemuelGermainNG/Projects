<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Enum\Layout\Wrap;

trait HasWrap
{
    protected Wrap $wrap = Wrap::NoWrap;

    public function wrap(
        Wrap|string|null $wrap = null,
    ): Wrap|static {
        if (func_num_args() === 0) {
            return $this->wrap;
        }

        if (is_string($wrap)) {
            $wrap = Wrap::from($wrap);
        }

        return $this->with('wrap', $wrap);
    }
}
