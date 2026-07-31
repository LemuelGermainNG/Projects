<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use BackedEnum;
use Closure;

trait HasIcon
{
    protected ?string $icon = null;

    public function icon(
        BackedEnum|Closure|string|null $icon = null,
    ): string|static|null {
        if (func_num_args() === 0) {
            return $this->icon;
        }

        if ($icon instanceof BackedEnum) {
            $icon = $icon->value;
        }

        return $this->with('icon', $icon);
    }
}
