<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Enums\Layout\Justify;

trait HasJustify
{
    protected Justify $justify = Justify::Start;

    public function justify(
        Justify|string|null $justify = null,
    ): Justify|static {
        if (func_num_args() === 0) {
            return $this->justify;
        }

        if (is_string($justify)) {
            $justify = Justify::from($justify);
        }

        return $this->with('justify', $justify);
    }
}
