<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Schema;

trait HasEnd
{
    protected ?Schema $end = null;

    public function end(?Schema $end = null): Schema|static|null
    {
        if (func_num_args() === 0) {
            return $this->end;
        }

        return $this->with('end', $end);
    }
}
