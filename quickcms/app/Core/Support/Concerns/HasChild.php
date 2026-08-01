<?php

namespace App\Core\Support\Concerns;

use App\Core\Schema\Schema;

trait HasChild
{
    protected ?Schema $child = null;

    public function child(?Schema $child = null): Schema|static|null
    {
        if (func_num_args() === 0) {
            return $this->child;
        }

        return $this->with('child', $child);
    }
}
