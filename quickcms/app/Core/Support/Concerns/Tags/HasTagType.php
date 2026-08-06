<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Tags;

use Closure;

trait HasTagType
{
    protected string|Closure|null $tagType = null;

    public function tagType(
        string|Closure|null $type = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->tagType;
        }

        return $this->with(
            'tagType',
            $type,
        );
    }
}
