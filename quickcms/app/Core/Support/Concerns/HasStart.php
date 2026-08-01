<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Schema;

trait HasStart
{
    protected ?Schema $start = null;

    public function start(?Schema $start = null): Schema|static|null
    {
        if (func_num_args() === 0) {
            return $this->start;
        }

        return $this->with('start', $start);
    }
}
