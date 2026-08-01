<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Header\HeaderSchema;

trait HasHeader
{
    protected ?HeaderSchema $header = null;

    public function header(
        ?HeaderSchema $header = null,
    ): HeaderSchema|static|null {

        if (func_num_args() === 0) {
            return $this->header;
        }

        return $this->with(
            'header',
            $header,
        );
    }
}
