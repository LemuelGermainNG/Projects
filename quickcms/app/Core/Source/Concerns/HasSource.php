<?php

declare(strict_types=1);

namespace App\Core\Source\Concerns;

use App\Core\Source\Source;

trait HasSource
{
    /**
     * @var class-string<Source>|null
     */
    protected ?string $source = null;

    /**
     * @param class-string<Source>|null $source
     *
     * @return class-string<Source>|static|null
     */
    public function source(?string $source = null): string|static|null
    {
        if (func_num_args() === 0) {
            return $this->source;
        }

        return $this->with('source', $source);
    }

    public function hasSource(): bool
    {
        return $this->source !== null;
    }
}
