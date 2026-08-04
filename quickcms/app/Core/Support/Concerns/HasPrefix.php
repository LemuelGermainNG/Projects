<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Schema;

trait HasPrefix
{
    protected ?Schema $prefix = null;

    public function prefix(
        ?Schema $prefix = null,
    ): Schema|null|static {
        if (func_num_args() === 0) {
            return $this->prefix;
        }

        return $this->with(
            'prefix',
            $prefix,
        );
    }
}
