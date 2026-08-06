<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Repeater;

use App\Core\Support\Enum\Repeater\RepeaterLayout;
use Closure;

trait HasLayout
{
    protected RepeaterLayout|Closure|null $layout = null;

    public function layout(
        RepeaterLayout|Closure|null $layout = null,
    ): RepeaterLayout|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->layout;
        }

        return $this->with(
            'layout',
            $layout,
        );
    }
}
