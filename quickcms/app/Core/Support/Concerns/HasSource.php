<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Source\Source;
use Closure;

trait HasSource
{
    /**
     * @var class-string<Source>|Source|Closure|null
     */
    protected string|Source|Closure|null $source = null;

    /**
     * @param class-string<Source>|Source|Closure|null $source
     *
     * @return class-string<Source>|Source|Closure|static|null
     */
    public function source(
        string|Source|Closure|null $source = null,
    ): string|Source|Closure|static|null {
        if (func_num_args() === 0) {
            return $this->source;
        }

        return $this->with(
            'source',
            $source,
        );
    }

    public function hasSource(): bool
    {
        return $this->source !== null;
    }
}
