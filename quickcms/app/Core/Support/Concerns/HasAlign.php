<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Support\Enums\Layout\Align;

trait HasAlign
{
    protected Align $align = Align::Stretch;

    public function align(
        Align|string|null $align = null,
    ): Align|static {
        if (func_num_args() === 0) {
            return $this->align;
        }

        if (is_string($align)) {
            $align = Align::from($align);
        }

        return $this->with('align', $align);
    }
}
