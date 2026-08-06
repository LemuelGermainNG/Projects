<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Tags;

use Closure;

trait HasLocale
{
    protected string|Closure|null $locale = null;

    public function locale(
        string|Closure|null $locale = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->locale;
        }

        return $this->with(
            'locale',
            $locale,
        );
    }
}
