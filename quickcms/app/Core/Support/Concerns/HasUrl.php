<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use Closure;

trait HasUrl
{
    protected string|Closure|null $url = null;

    public function url(
        string|Closure|null $url = null,
    ): string|Closure|static|null {
        if ($url === null) {
            return $this->url;
        }

        return $this->with('url', $url);
    }
}
