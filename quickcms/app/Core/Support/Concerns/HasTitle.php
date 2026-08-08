<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasTitle
{
    protected string|Closure $title = '';

    public function title(
        string|Closure|null $title = null,
    ): string|Closure|static {
        if ($title === null) {
            return $this->title;
        }

        return $this->with(
            'title',
            $title,
        );
    }
}
