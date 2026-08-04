<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Schema;

trait HasSuffix
{
    protected ?Schema $suffix = null;

    public function suffix(
        ?Schema $suffix = null,
    ): Schema|null|static {
        if (func_num_args() === 0) {
            return $this->suffix;
        }

        return $this->with(
            'suffix',
            $suffix,
        );
    }
}
